class CadastroServicosBase < ActiveRecord::Migration
  def change
    servicos = ["Elétrica", "Instalação de Som e Imagem", "Encanador", "Pedreiro",
      "Instalação de Pisos e Revestimentos", "Fixação", "Montagem de móveis",
      "Ar Condicionado", "Caixa D' agua", "Pintura e Papel de parede", "Portas e Janelas"]
    servicos.each do |descricao|
      @servico = Servico.new(:descricao => descricao)
      @servico.save!
    end
  end
end
