class AddPasswordDigestToPessoas < ActiveRecord::Migration
  def self.up
    add_column :pessoas, :password_digest, :string
  end

  def self.down
    remove_column :pessoas, :password_digest
  end

end
