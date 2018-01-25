class CreateOrcamentoPrestadors < ActiveRecord::Migration
  def change
    create_table :orcamento_prestadors do |t|
      t.integer :orcamento_id
      t.integer :prestador_id
      t.float   :valor_acordado
      t.date    :data_fechamento
      t.boolean :fechado
      t.boolean :cancelado

      t.timestamps null: false
    end
  end
end
