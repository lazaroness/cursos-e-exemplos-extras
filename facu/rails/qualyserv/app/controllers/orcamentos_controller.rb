class OrcamentosController < ApplicationController

  def index
  end

  def new
    @pessoa    = Pessoa.find(session[:pessoa_id])
    @orcamento = Orcamento.new
  end

  def create
    @pessoa = Pessoa.find(session[:pessoa_id])
    @orcamento = Orcamento.new(orcamento_params)
    if @orcamento.save
      redirect_to @orcamento, notice: "Orcamento foi criado com sucesso!"
    else
      render action: :new
    end
  end

  def show
    @pessoa    = Pessoa.find(session[:pessoa_id])
    @orcamento = Orcamento.find(params[:id])
  end

  def abertos
    @pessoa     = Pessoa.find(session[:pessoa_id])
    @orcamentos = @pessoa.orcamentos_abertos
  end

  def fechados
    @pessoa     = Pessoa.find(session[:pessoa_id])
    @orcamentos = @pessoa.orcamentos_fechados
  end

  def concluidos
    @pessoa     = Pessoa.find(session[:pessoa_id])
    @orcamentos = @pessoa.orcamentos_concluidos
  end

  private

  def orcamento_params
    params.require(:orcamento).permit(:solicitante_id, :endereco_id, :descricao_servico, :servico_id, :fechado, :concluido)
  end
end
