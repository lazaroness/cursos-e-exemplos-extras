class ApplicationController < ActionController::Base
  # Prevent CSRF attacks by raising an exception.
  # For APIs, you may want to use :null_session instead.
  protect_from_forgery with: :exception
  include SessionsHelper

  def authorize
    unless logged_in?
      redirect_to root_url
    end
  end

  def correct_pessoa?
    @pessoa = Pessoa.find(params[:id])
    unless current_pessoa == @pessoa
      redirect_to pessoas_path
    end
  end

end
