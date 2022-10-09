#include <cstdlib>
#include <cstdio>
#include <iostream>
#include <fstream>
#include <conio.h>
#include <time.h>
#include <math.h>
using namespace std;
int main()
{
	int n,m;
	cout<<"Ile wierszy"<<endl;
	cin>>n;
	cout<<"Ile kolumn"<<endl;
	cin>>m;
	srand(time(NULL));
	int t[n][m];
	int suma=0;
	for(int i=0;i<n;i++)
	for(int j=0;j<m;j++)
	{
		t[i][j]=rand()%10;
		suma+=t[i][j];
	}
	for(int i=0;i<n;i++)
	{
		for(int j=0;j<m;j++)
		cout<<t[i][j];
		cout<<endl;
	}
	
	cout<<"Suma wynosi "<<suma<<endl;
	
	system("PAUSE");
	return 0;
}
