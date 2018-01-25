class CreateTelefones < ActiveRecord::Migration
  def change
    create_table :telefones do |t|
      t.integer :pessoa_id
      t.string  :tipo
      t.string  :ddd
      t.string  :ddi
      t.string  :numero

      t.timestamps null: false
    end
  end
end
