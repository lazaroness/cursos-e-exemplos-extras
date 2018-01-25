class CreateOrcamentos < ActiveRecord::Migration
  def change
    create_table :orcamentos do |t|
      t.integer :solicitante_id
      t.integer :prestador_id
      t.integer :endereco_id
      t.float   :valor_acordado
      t.boolean :fechado
      t.date    :data_inicio_servico
      t.date    :data_fim_servico
      t.boolean :concluido

      t.timestamps null: false
    end
  end
end
