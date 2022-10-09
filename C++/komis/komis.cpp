#include <cstdlib>
#include <cstdio>
#include <iostream>
#include <fstream>
#include <conio.h>
#include <time.h>
#include <math.h>
using namespace std;
int ile(){
	int i=0;
	string p;
	ifstream u("dane.txt");
	while(getline(u,p))
	i++;
	return i;
}
struct komis{
	int id;
	string marka;
	string model;
	int rocznik;
	int cena;
	int przebieg;
	string stan;
};
int main()
{
	char koniec;
	do{
		system("cls");
		int y=ile();
		int w;
		cout<<"MENU"<<endl
		<<"1 - przegladaj"<<endl
		<<"2 - dopisz"<<endl;
		cin>>w;
		switch(w){
			case 1:
				{
					ifstream u("dane.txt");
					komis samochody[y];
					int k=0;
					while(!u.eof())
					{
						u>>samochody[k].id;
						u>>samochody[k].marka;
						u>>samochody[k].model;
						u>>samochody[k].rocznik;
						u>>samochody[k].cena;
						u>>samochody[k].przebieg;
						u>>samochody[k].stan;
						k++;
					}
					for(k=0;k<y;k++)
					cout<<samochody[k].id<<" "
						<<samochody[k].marka<<" "
						<<samochody[k].model<<" "
						<<samochody[k].rocznik<<" "
						<<samochody[k].cena<<" "
						<<samochody[k].przebieg<<" "
						<<samochody[k].stan<<" "<<endl;
					break;
				}
			case 2:
				{
					ofstream p("dane.txt", ios::app);
					int ile;
					string marka,model,stan;
					int rocznik,cena,przebieg;
					cout<<"Ile samochodow dopisac?"<<endl;
					cin>>ile;
					for (int i=0;i<ile;i++){
						cout<<"Podaj marke"<<endl;
						cin>>marka;
						cout<<"Podaj model"<<endl;
						cin>>model;
						cout<<"Podaj rocznik"<<endl;
						cin>>rocznik;
						cout<<"Podaj cene"<<endl;
						cin>>cena;
						cout<<"Podaj przebieg"<<endl;
						cin>>przebieg;
						cout<<"Podaj stan"<<endl;
						cin>>stan;
						p<<(y+=1)<<" "<<marka<<" "<<model<<" "<<rocznik<<" "<<cena<<" "<<przebieg<<" "<<stan<<endl;
					}
					break;
				}
		}
		cout<<endl<<"Zakoczyc? T/N"<<endl;
		cin>>koniec;
	}
	while(koniec=='N'|| koniec=='n');
	system("PAUSE");
	return 0;	
}
