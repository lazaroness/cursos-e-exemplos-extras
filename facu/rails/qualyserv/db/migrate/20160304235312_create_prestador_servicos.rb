class CreatePrestadorServicos < ActiveRecord::Migration
  def change
    create_table :prestador_servicos do |t|
      t.integer :servico_id
      t.integer :prestador_id

      t.timestamps null: false
    end
  end
end
