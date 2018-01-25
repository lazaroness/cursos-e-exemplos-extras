class OrcamentoPrestadorsController < ApplicationController
  def index
    @pessoa = Pessoa.find(session[:pessoa_id])
  end

  def show
    @pessoa = Pessoa.find(session[:pessoa_id])
    @orcamento_prestador = OrcamentoPrestador.find(params[:id])
  end

  def new
    @pessoa = Pessoa.find(session[:pessoa_id])
    @orcamento = Orcamento.find(params[:orcamento_id])
    @orcamento_prestador = OrcamentoPrestador.new
  end

  def create
    @pessoa = Pessoa.find(session[:pessoa_id])
    @orcamento = Orcamento.find(params[:orcamento_prestador][:orcamento_id])
    @orcamento_prestador= OrcamentoPrestador.new(orcamento_params)
    if @orcamento_prestador.save
      redirect_to @orcamento_prestador, notice: "Proposta foi criada com sucesso!"
    else
      render action: :new
    end
  end

  def abertos
    @pessoa = Pessoa.find(session[:pessoa_id])
  end

  def cancelar
    @orcamento_prestador= OrcamentoPrestador.find(params[:id])
    @orcamento_prestador.update_attribute(:cancelado, true)
    redirect_to action: :abertos, notice: "Proposta foi cancelada!"
  end

  private
  def orcamento_params
    params.require(:orcamento_prestador).permit(:prestador_id, :observacao, :valor_acordado, :orcamento_id, :fechado, :cancelado)
  end
end
