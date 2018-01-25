class AddDescricaoOrcamento < ActiveRecord::Migration
  def change
    add_column :orcamentos, :descricao_servico, :text
  end
end
