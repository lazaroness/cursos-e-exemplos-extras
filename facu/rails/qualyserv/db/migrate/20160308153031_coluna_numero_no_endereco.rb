class ColunaNumeroNoEndereco < ActiveRecord::Migration
  def self.up
    add_column :enderecos, :numero, :string
  end

  def self.down
    remove_column :enderecos, :numero
  end
end
