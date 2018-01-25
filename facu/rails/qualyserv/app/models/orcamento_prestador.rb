class OrcamentoPrestador < ActiveRecord::Base
  #----------------------------------------------------------------------------
  # VALIDAÇÕES
  #----------------------------------------------------------------------------
  validates_presence_of :prestador_id, :orcamento_id, :valor_acordado
  validates_length_of :observacao, minimum: 15, allow_blank: false

  #----------------------------------------------------------------------------
  # RELACIONAMENTOS
  #----------------------------------------------------------------------------
  belongs_to :prestador, class_name: "Pessoa", foreign_key: "prestador_id"

  def self.factory(params)
    @orcamento = OrcamentoPrestador.new
    @orcamento.prestador_id = params[:prestador_id]
    @orcamento.orcamento_id = params[:orcamento_id]
    @orcamento.fechado      = false
    @orcamento.cancelado    = false
    @orcamento.save!
    @orcamento
  end

end
