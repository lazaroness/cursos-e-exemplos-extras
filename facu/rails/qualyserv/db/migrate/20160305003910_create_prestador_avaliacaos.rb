class CreatePrestadorAvaliacaos < ActiveRecord::Migration
  def change
    create_table :prestador_avaliacaos do |t|
      t.integer :orcamento_id
      t.string  :mensagem
      t.float   :pontuacao

      t.timestamps null: false
    end
  end
end
