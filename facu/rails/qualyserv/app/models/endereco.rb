class Endereco < ActiveRecord::Base
  # TABELA GENERICA:
  # PODE SER USADA PARA QUALQUER TIPO DE USUARIO, :CLIENTE, :PRESTADOR, :ADMIN ...

  #----------------------------------------------------------------------------
  # VALIDACOES
  #----------------------------------------------------------------------------
  validates_presence_of :cep, :logradouro, :numero, :bairro, :cidade, :uf

  #----------------------------------------------------------------------------
  # RETORNA O ENDEREÇO FORMATADO PARA EXIBIÇÃO
  #----------------------------------------------------------------------------
  def to_s
    "#{self.logradouro}, Nº #{self.numero} - #{self.bairro} (#{self.cidade}) - #{self.uf} / #{self.cep}"
  end

end
