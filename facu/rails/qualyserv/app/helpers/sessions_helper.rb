module SessionsHelper
  def sign_in
    session[:pessoa_id] = @pessoa.id
  end

  def current_pessoa
    @current_pessoa ||= Pessoa.find_by(id: session[:pessoa_id])
  end

  def block_access
    if current_pessoa.present?
      redirect_to pessoas_path
    end
  end

  def logged_in?
    !current_pessoa.nil?
  end

  def sign_out
    session.delete(:pessoa_id)
    @current_pessoa = nil
  end

end
