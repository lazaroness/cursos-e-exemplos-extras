class Orcamento < ActiveRecord::Base
  #----------------------------------------------------------------------------
  # VALIDAÇÕES
  #----------------------------------------------------------------------------
  validates_presence_of :solicitante_id, :servico_id, :endereco_id
  validates_length_of :descricao_servico, minimum: 15, allow_blank: false

  #----------------------------------------------------------------------------
  # RELACIONAMENTOS
  #----------------------------------------------------------------------------
  belongs_to :solicitante, class_name: "Pessoa", foreign_key: "solicitante_id"
  belongs_to :prestador,   class_name: "Pessoa", foreign_key: "prestador_id"
  belongs_to :endereco,    class_name: "Endereco"

  def self.factory(params)
    @orcamento = Orcamento.new
    @orcamento.solicitante_id    = params[:solicitante_id]
    @orcamento.endereco_id       = params[:endereco_id]
    @orcamento.descricao_servico = params[:descricao_servico]
    @orcamento.fechado           = false
    @orcamento.concluido         = false
    @orcamento.save!
    @orcamento
  end

  def to_s
    self.descricao_servico
  end

  def propostas
    OrcamentoPrestador.where("orcamento_id = #{self.id} and cancelado = false and fechado = false")
  end

end
