class EnderecosController < ApplicationController
  def index
    @pessoa   = Pessoa.find(session[:pessoa_id])
    @endereco = Endereco.new
  end

  def create
    @pessoa   = Pessoa.find(session[:pessoa_id])
    dados     = params[:endereco]
    @endereco = Endereco.new
    @endereco.pessoa_id   = dados[:pessoa_id]
    @endereco.cep         = dados[:cep]
    @endereco.logradouro  = dados[:logradouro]
    @endereco.numero      = dados[:numero]
    @endereco.bairro      = dados[:bairro]
    @endereco.cidade      = dados[:cidade]
    @endereco.uf          = dados[:uf]
    @endereco.complemento = dados[:complemento]
    if @endereco.save
      redirect_to @pessoa, notice: "Endereço foi criado com sucesso!"
    else
      render action: 'index'
    end
  end
end
