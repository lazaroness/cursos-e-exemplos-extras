Rails.application.routes.draw do

  root 'home#index'

  get 'home/index'

  get    'sign_in'   => 'sessions#new'
  post   'sign_in'   => 'sessions#create'
  delete 'sign_out'  => 'sessions#destroy'

  # TELEFONE
  resources :telefones
  get 'telefones/create'

  # ENDERECO
  resources :enderecos
  get 'enderecos/new'

  # ORCAMENTOS
  resources :orcamentos do
    member do
      get :abertos
      get :fechados
      get :concluidos
    end
  end
  get 'orcamentos/abertos'
  get 'orcamentos/fechados'
  get 'orcamentos/concluidos'

  # PESSOAS
  resources :pessoas do
    member do
      get  :servicos
      get  :alterar_servicos
      post :alterar_servicos_do
      get  :new_endereco
      get  :new_telefone
    end
  end
  get  'pessoas/servicos'
  get  'pessoas/alterar_servicos'
  post 'pessoas/alterar_servicos_do'
  get  'pessoas/new_endereco'
  get  'pessoas/new_telefone'

  # ORCAMENTOS DO PRESTADOR
  resources :orcamento_prestadors do
    member do
      get 'orcamento_prestadors/abertos'
      get 'orcamento_prestadors/aceitas'
      get 'orcamento_prestadors/concluidos'
      get 'orcamento_prestadors/cancelar'
    end
  end
  get 'orcamento_prestadors/abertos'
  get 'orcamento_prestadors/aceitas'
  get 'orcamento_prestadors/concluidos'
  get 'orcamento_prestadors/cancelar'

  # The priority is based upon order of creation: first created -> highest priority.
  # See how all your routes lay out with "rake routes".

  # You can have the root of your site routed with "root"
  # root 'welcome#index'

  # Example of regular route:
  #   get 'products/:id' => 'catalog#view'

  # Example of named route that can be invoked with purchase_url(id: product.id)
  #   get 'products/:id/purchase' => 'catalog#purchase', as: :purchase

  # Example resource route (maps HTTP verbs to controller actions automatically):
  #   resources :products

  # Example resource route with options:
  #   resources :products do
  #     member do
  #       get 'short'
  #       post 'toggle'
  #     end
  #
  #     collection do
  #       get 'sold'
  #     end
  #   end

  # Example resource route with sub-resources:
  #   resources :products do
  #     resources :comments, :sales
  #     resource :seller
  #   end

  # Example resource route with more complex sub-resources:
  #   resources :products do
  #     resources :comments
  #     resources :sales do
  #       get 'recent', on: :collection
  #     end
  #   end

  # Example resource route with concerns:
  #   concern :toggleable do
  #     post 'toggle'
  #   end
  #   resources :posts, concerns: :toggleable
  #   resources :photos, concerns: :toggleable

  # Example resource route within a namespace:
  #   namespace :admin do
  #     # Directs /admin/products/* to Admin::ProductsController
  #     # (app/controllers/admin/products_controller.rb)
  #     resources :products
  #   end
end
