#include "lua.h"
#include "lualib.h"
#include "lauxlib.h"
#include <stdio.h>

int main(){
  lua_State *L = lua_open();
  luaL_openlibs(L);
  int rv = luaL_loadfile(L, "hello-world.lua");
  if(rv){
    fprintf(stderr, "%s\n", lua_tostring(L, -1));
    return rv;
  }else{
    rv = lua_pcall(L, 0, 0, lua_gettop(L) -1);
  }
  printf("fim...");
  return 0;
}
