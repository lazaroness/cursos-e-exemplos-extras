class CreatePessoas < ActiveRecord::Migration
  def self.up
    create_table :pessoas do |t|
      t.string :nome
      t.string :email
      t.string :tipo
      t.string :cpf_cnpj
      t.string :sexo
      t.date   :data_nascimento_fundacao

      t.timestamps null: false
    end
  end

  def self.down
    drop_table :pessoas
  end
end
