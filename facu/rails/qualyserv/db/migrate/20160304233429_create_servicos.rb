class CreateServicos < ActiveRecord::Migration
  def change
    create_table :servicos do |t|
      t.string :descricao

      t.timestamps null: false
    end
  end
end
