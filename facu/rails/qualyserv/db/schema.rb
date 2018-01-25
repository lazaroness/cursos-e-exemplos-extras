# encoding: UTF-8
# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 20160320190307) do

  # These are extensions that must be enabled in order to support this database
  enable_extension "plpgsql"

  create_table "enderecos", force: :cascade do |t|
    t.integer  "pessoa_id"
    t.string   "tipo"
    t.string   "cep"
    t.string   "logradouro"
    t.string   "bairro"
    t.string   "cidade"
    t.string   "uf"
    t.string   "complemento"
    t.string   "codigo_municipio"
    t.datetime "created_at",       null: false
    t.datetime "updated_at",       null: false
    t.string   "numero"
  end

  create_table "orcamento_prestadors", force: :cascade do |t|
    t.integer  "orcamento_id"
    t.integer  "prestador_id"
    t.float    "valor_acordado"
    t.date     "data_fechamento"
    t.boolean  "fechado"
    t.boolean  "cancelado"
    t.datetime "created_at",      null: false
    t.datetime "updated_at",      null: false
    t.text     "observacao"
  end

  create_table "orcamentos", force: :cascade do |t|
    t.integer  "solicitante_id"
    t.integer  "prestador_id"
    t.integer  "endereco_id"
    t.float    "valor_acordado"
    t.boolean  "fechado"
    t.date     "data_inicio_servico"
    t.date     "data_fim_servico"
    t.boolean  "concluido"
    t.datetime "created_at",          null: false
    t.datetime "updated_at",          null: false
    t.text     "descricao_servico"
    t.integer  "servico_id"
  end

  create_table "pessoas", force: :cascade do |t|
    t.string   "nome"
    t.string   "email"
    t.string   "tipo"
    t.string   "cpf_cnpj"
    t.string   "sexo"
    t.date     "data_nascimento_fundacao"
    t.datetime "created_at",               null: false
    t.datetime "updated_at",               null: false
    t.string   "password_digest"
  end

  create_table "prestador_avaliacaos", force: :cascade do |t|
    t.integer  "orcamento_id"
    t.string   "mensagem"
    t.float    "pontuacao"
    t.datetime "created_at",   null: false
    t.datetime "updated_at",   null: false
  end

  create_table "prestador_servicos", force: :cascade do |t|
    t.integer  "servico_id"
    t.integer  "prestador_id"
    t.datetime "created_at",   null: false
    t.datetime "updated_at",   null: false
  end

  create_table "servicos", force: :cascade do |t|
    t.string   "descricao"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "telefones", force: :cascade do |t|
    t.integer  "pessoa_id"
    t.string   "tipo"
    t.string   "ddd"
    t.string   "ddi"
    t.string   "numero"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

end
