class AddServicoIdEmOrcamentos < ActiveRecord::Migration
  def change
    add_column :orcamentos, :servico_id, :integer, :not_null => true
  end
end
