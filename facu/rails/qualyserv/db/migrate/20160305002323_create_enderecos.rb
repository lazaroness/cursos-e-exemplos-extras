class CreateEnderecos < ActiveRecord::Migration
  def change
    create_table :enderecos do |t|
      t.integer :pessoa_id
      t.string  :tipo
      t.string  :cep
      t.string  :logradouro
      t.string  :bairro
      t.string  :cidade
      t.string  :uf
      t.string  :complemento
      t.string  :codigo_municipio

      t.timestamps null: false
    end
  end
end
