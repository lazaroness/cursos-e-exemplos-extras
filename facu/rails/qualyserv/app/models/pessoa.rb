class Pessoa < ActiveRecord::Base
  has_secure_password

  #----------------------------------------------------------------------------
  # VALIDAÇÕES
  #----------------------------------------------------------------------------
  validates :nome, presence: true, length: {maximum: 50}
  validates :sexo, presence: true
  validates :tipo, presence: true
  validates :cpf_cnpj, presence: true
  validates :password, presence: true, length: {minimum: 6}
  VALID_EMAIL_FORMAT= /\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})\Z/i
  validates :email, presence: true, length: {maximum: 260}, format: { with: VALID_EMAIL_FORMAT}, uniqueness: {case_sensitive: false}
  before_save { self.email = email.downcase }
  validates_uniqueness_of :cpf_cnpj

  #----------------------------------------------------------------------------
  # RELACIONAMENTOS
  #----------------------------------------------------------------------------
  has_many :enderecos, class_name: "Endereco", foreign_key: "pessoa_id"
  has_many :telefones, class_name: "Telefone", foreign_key: "pessoa_id"

  TIPO = {
    ''          => '',
    'Cliente'   => 'Cliente',
    'Prestador' => 'Prestador'
  }

  SEXO = {
    ''          => '',
    'Feminino'  => 'Feminino',
    'Masculino' => 'Masculino'
  }

  def to_s
    self.nome
  end

  def cliente?
    self.tipo.eql?('Cliente')
  end

  def prestador?
    self.tipo.eql?('Prestador')
  end

  def enderecos_hash
    enderecos = {' ' => nil}
    self.enderecos.each do |endereco|
      enderecos[endereco.to_s] = endereco.id
    end
    enderecos
  end

  #-------------------------------------------------------------------------------
  # CLIENTE
  #-------------------------------------------------------------------------------
  def orcamentos_abertos
    Orcamento.where("solicitante_id = #{self.id} and fechado = false and concluido = false").order("created_at DESC")
  end

  def orcamentos_fechados
    Orcamento.where("solicitante_id = #{self.id} and fechado = true and concluido = false").order("created_at DESC")
  end

  def orcamentos_concluidos
    Orcamento.where("solicitante_id = #{self.id} and fechado = true and concluido = false").order("created_at DESC")
  end

  #-------------------------------------------------------------------------------
  # PRESTADOR
  #-------------------------------------------------------------------------------
  def factory_servicos(params)
    # Removendo os serviços prestados cadastrados
    PrestadorServico.where("prestador_id = #{self.id}").each { |prestador_servico| prestador_servico.destroy }
    # Cadastrando apenas os informados
    params.try(:values).try(:each) do |servico_id|
      PrestadorServico.create(:servico_id => servico_id, :prestador_id => self.id)
    end
    true
  end

  def servicos
    prestador_servicos = []
    PrestadorServico.where("prestador_id = #{self.id}").each do |prestador_servico|
      prestador_servicos << prestador_servico.servico
    end
    prestador_servicos
  end

  def servicos_ids
    servicos_ids = "("
    PrestadorServico.where("prestador_id = #{self.id}").each do |prestador_servico|
      unless servicos_ids.eql?("(")
        servicos_ids.concat(", #{prestador_servico.servico_id}")
      else
        servicos_ids.concat("#{prestador_servico.servico_id}")
      end
    end
    servicos_ids.concat(")")
    servicos_ids
  end

  def orcamentos_disponiveis
    Orcamento.where("fechado = false and concluido = false and servico_id IN #{self.servicos_ids}").order("created_at DESC")
  end

  def propostas_em_aberto
    OrcamentoPrestador.where("fechado = false and cancelado = false and prestador_id = #{self.id}").order("created_at DESC")
  end

end
