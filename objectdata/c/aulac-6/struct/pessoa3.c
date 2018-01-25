#include <stdio.h>

typedef struct PessoaStruct {
	int id;
	char * nome;
	char * sobrenome;
} Pessoa;

void imprimeCadastro(Pessoa);

int main(){
	Pessoa p;
	p.id = 228;
	p.nome = "Lazarone";
	p.sobrenome = "S. Santana";

	imprimeCadastro(p);
}

void imprimeCadastro(Pessoa p){
	printf("#Cadastro\n");
	printf("id: %i\n", p.id);
	printf("nome: %s\n", p.nome);
	printf("sobrenome: %s\n", p.sobrenome);
}