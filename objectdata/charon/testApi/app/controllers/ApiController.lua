local ApiController = Class.new('ApiController', 'Controller')

function ApiController:productAction()
  -- http://localhost:2345/api/product
  local httpMethod = self:env():requestMethod()
  local data       = {}

  if httpMethod == 'GET' then
    if self:params().id ~= nil then
      -- http://localhost:2345/api/product?id=1
      data = { code = '00001', message = 'Busca individual de produto não implementada.' }
    else
      -- http://localhost:2345/api/product
      data = { code = '00001', message = 'Busca de produtos não implementada.' }
    end
  elseif httpMethod == 'POST' then
    -- http://localhost:2345/api/product
    data = { code = '00002', message = 'Cadastro de produto não implementado.' }
  elseif httpMethod == 'PUT' then
    if self:params().id ~= nil then
      -- http://localhost:2345/api/product?id=1
      data = { code = '00003', message = 'Atualização de produto não implementado.' }
    else
      -- http://localhost:2345/api/product
      data = { code = '00003', message = 'Id não informado.' }
    end
  elseif httpMethod == 'DELETE' then
    if self:params().id ~= nil then
      -- http://localhost:2345/api/product?id=1
      data = { code = '00004', message = 'Exclusão de produto não implementado.' }
    else
      -- http://localhost:2345/api/product
      data = { code = '00004', message = 'Id não informado.' }
    end
  else
    data = { code = '00005', message = string.format("Method Http: %s não suportado.", httpMethod) }
  end

  return self:render{ output = 'text', value = Json.encode(data) }
end

return ApiController
