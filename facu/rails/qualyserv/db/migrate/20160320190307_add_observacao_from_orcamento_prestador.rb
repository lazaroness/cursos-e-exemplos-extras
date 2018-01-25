class AddObservacaoFromOrcamentoPrestador < ActiveRecord::Migration
  def change
    add_column :orcamento_prestadors, :observacao, :text
  end
end
