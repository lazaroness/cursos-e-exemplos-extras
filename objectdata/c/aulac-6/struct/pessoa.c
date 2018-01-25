#include <stdio.h>

struct Pessoa {
	int id;
	char * nome;
	char * sobrenome;
};

void imprimeCadastro(struct Pessoa);

int main(){
	struct Pessoa p;
	p.id = 228;
	p.nome = "Lazarone";
	p.sobrenome = "S. Santana";

	imprimeCadastro(p);
}

void imprimeCadastro(struct Pessoa p){
	printf("#Cadastro\n");
	printf("id: %i\n", p.id);
	printf("nome: %s\n", p.nome);
	printf("sobrenome: %s\n", p.sobrenome);
}