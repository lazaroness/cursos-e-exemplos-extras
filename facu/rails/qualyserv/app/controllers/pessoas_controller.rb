class PessoasController < ApplicationController

  before_action :authorize, except: [:new, :create]
  before_action :correct_pessoa?, only: [:edit, :update, :destroy]

  def index
    @pessoas = Pessoa.all
  end

  def new
    @pessoa = Pessoa.new
  end

  def create
    @pessoa = Pessoa.new(pessoa_params)
    if @pessoa.save
      redirect_to @pessoa, notice: "Usuário foi criado com sucesso!"
      sign_in
    else
      render action: :new
    end
  end

  def show
    @pessoa = Pessoa.find(params[:id])
  end

  def edit
    @pessoa = Pessoa.find(params[:id])
  end

  def update
    @pessoa = Pessoa.find(params[:id])
    if @pessoa.update_attributes(pessoa_params)
      redirect_to pessoas_path
    else
      render action: :edit
    end
  end

  def destroy
    @pessoa = Pessoa.find(params[:id])
    @pessoa.destroy
    sign_out
    redirect_to root_path
  end

  def new_telefone
    @pessoa   = Pessoa.find(session[:pessoa_id])
    @telefone = Telefone.new
  end

  def servicos
    @pessoa = Pessoa.find(session[:pessoa_id])
  end

  def alterar_servicos
    @pessoa   = Pessoa.find(session[:pessoa_id])
    @servicos = @pessoa.servicos
  end

  def alterar_servicos_do
    @pessoa = Pessoa.find(session[:pessoa_id])
    @pessoa.factory_servicos(params[:servicos])
    redirect_to action: :servicos
  end

  private

  def pessoa_params
    params.require(:pessoa).permit(:nome, :email, :tipo, :cpf_cnpj, :sexo, :data_nascimento_fundacao, :password, :password_confirmation)
  end

end
