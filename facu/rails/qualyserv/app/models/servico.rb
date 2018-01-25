class Servico < ActiveRecord::Base
  validates :descricao, presence: true, length: {minimum: 3}

  def to_s
    self.descricao
  end

  def to_chave
    self.to_s.mb_chars.downcase.gsub(" ", "_").to_s
  end

  def self.select_hash
    servicos = {' ' => nil}
    Servico.all.each do |servico|
      servicos[servico.to_s] = servico.id
    end
    servicos
  end

end
