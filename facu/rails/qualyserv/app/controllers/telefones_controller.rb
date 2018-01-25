class TelefonesController < ApplicationController
  def create
    @pessoa = Pessoa.find(session[:pessoa_id])
    dados = params[:telefone]
    @telefone = Telefone.new
    @telefone.pessoa_id = dados[:pessoa_id]
    @telefone.tipo      = dados[:tipo]
    @telefone.ddd       = dados[:ddd]
    @telefone.ddi       = "+55"
    @telefone.numero    = dados[:numero]
    if @telefone.save
      redirect_to @pessoa, notice: "Telefine foi criado com sucesso!"
    end
  end
end
