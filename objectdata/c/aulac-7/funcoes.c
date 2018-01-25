static int totalChamadas = 0;

static int somar(int a, int b){
	totalChamadas ++;
	return a + b;
}

int outro(int a, int b){
	return somar(a, b);
}

int obterTotalChamadas(){
	return totalChamadas;
}