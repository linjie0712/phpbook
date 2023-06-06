#include<string.h> 
#include<stdio.h>

void main(){
	char a[] = "1234\0X";
	char b[] = "1234\0XY";
	printf("%d\n", strcmp(a,b)); //输出0，编译器认为 a = b
	printf("%d\n", strlen(b));//输出4
	return;
}