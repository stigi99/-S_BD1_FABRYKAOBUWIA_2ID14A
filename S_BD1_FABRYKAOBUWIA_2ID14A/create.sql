CREATE TABLE Adres (
ID_adres NUMBER CONSTRAINT adres_pk PRIMARY KEY,
Panstwo VARCHAR2(30) NOT NULL,
Miasto VARCHAR2(25) NOT NULL,
Kod_pocztowy VARCHAR(7) NOT NULL,
Ulica VARCHAR2(30) NOT NULL,
Nr VARCHAR2(10) NOT NULL
);

CREATE TABLE Osoba (
ID_osoby NUMBER CONSTRAINT Osoba_pk PRIMARY KEY,
Imie VARCHAR2(15) NOT NULL,
Nazwisko VARCHAR2(30) NOT NULL,
Wiek NUMBER NOT NULL CONSTRAINT ch_wiek CHECK((Wiek>=0) AND (Wiek<=125)),
Stan_cywilny VARCHAR2(12) NOT NULL,
Telefon VARCHAR2(20),
Pesel CHAR(11) NOT NULL CONSTRAINT osoba_uni UNIQUE,
Emial VARCHAR(30),
ID_adres NUMBER NOT NULL,
CONSTRAINT os_ad_fk FOREIGN KEY (ID_adres) REFERENCES Adres(ID_adres)
);

CREATE TABLE Klient (
ID_klienta NUMBER CONSTRAINT klient_pk PRIMARY KEY,
ID_osoby NUMBER NOT NULL CONSTRAINT kl_unique UNIQUE,
CONSTRAINT kl_os_fk FOREIGN KEY (ID_osoby) REFERENCES Osoba(ID_osoby)
);

CREATE TABLE Stanowisko (
ID_stanowiska NUMBER CONSTRAINT stanowisko_pk PRIMARY KEY,
Nazwa VARCHAR2(20) NOT NULL,
Dzial VARCHAR2(50)
);

CREATE TABLE Pracownik (
ID_pracownika NUMBER CONSTRAINT pracownik_pk PRIMARY KEY,
ID_osoby NUMBER NOT NULL CONSTRAINT pr_unique UNIQUE,
ID_stanowiska NUMBER NOT NULL,
Staz NUMBER NOT NULL CONSTRAINT ch_staz CHECK((Staz>=0) AND (Staz<=45)),
Pensja NUMBER NOT NULL CONSTRAINT pen_staz CHECK(Pensja>=1226),
CONSTRAINT pr_os_fk FOREIGN KEY (ID_osoby) REFERENCES Osoba(ID_osoby),
CONSTRAINT pr_st_fk FOREIGN KEY (ID_stanowiska) REFERENCES Stanowisko(ID_stanowiska)
);

CREATE TABLE Specyfikacja(
ID_specyfikacji NUMBER CONSTRAINT specyfikacja_pk PRIMARY KEY,
Kolor VARCHAR2(20) NOT NULL,
Materiał VARCHAR2(20) NOT NULL,
Fason VARCHAR2(20) NOT NULL
);

CREATE TABLE Kolekcja(
ID_kolekcja NUMBER CONSTRAINT kolekcjia_pk PRIMARY KEY,
Sezon VARCHAR2(10) NOT NULL,
Rok_produkcji NUMBER NOT NULL
);

CREATE TABLE Rozmiar(
ID_rozmiar NUMBER CONSTRAINT rozmiar_pk PRIMARY KEY,
Płeć VARCHAR2(15) NOT NULL,
Nr NUMBER NOT NULL
);

CREATE TABLE Produkt (
ID_produktu NUMBER CONSTRAINT Produkt_pk PRIMARY KEY,
ID_rozmiar NUMBER NOT NULL,
ID_kolekcja NUMBER NOT NULL,
ID_specyfikacji  NOT NULL CONSTRAINT pro_unique UNIQUE,
Nazwa VARCHAR2(20),
Marka VARCHAR2(20),
Cena NUMBER NOT NULL,
CONSTRAINT pro_ro_fk FOREIGN KEY (ID_rozmiar) REFERENCES Rozmiar(ID_rozmiar),
CONSTRAINT pro_ko_fk FOREIGN KEY (ID_kolekcja) REFERENCES Kolekcja(ID_kolekcja),
CONSTRAINT pro_sp_fk FOREIGN KEY (ID_specyfikacji) REFERENCES Specyfikacja(ID_specyfikacji)
);
CREATE TABLE Dostawca(
ID_dostawcy NUMBER CONSTRAINT Dostawca_pk PRIMARY KEY,
Cena NUMBER NOT NULL,
Nazwa VARCHAR2(10) NOT NULL,
NIP VARCHAR2(10) NOT NULL
);

CREATE TABLE Magazyn(
ID_magazynu NUMBER CONSTRAINT Magazyn_pk PRIMARY KEY,
ID_produktu NUMBER NOT NULL CONSTRAINT ma_unique UNIQUE,
Powieszchnia NUMBER NOT NULL,
Liczb_sztuk NUMBER NOT NULL,
CONSTRAINT ma_pro_fk FOREIGN KEY (ID_produktu) REFERENCES Produkt(ID_produktu)
);

CREATE TABLE Zlecenie (
ID_Zlecenia NUMBER CONSTRAINT zlecenie_pk PRIMARY KEY,
ID_dostawcy NUMBER NOT NULL,
ID_klienta NUMBER NOT NULL,
ID_magazynu NUMBER NOT NULL,
Data_zlozenia DATE NOT NULL,
CONSTRAINT zl_do_fk FOREIGN KEY (ID_dostawcy) REFERENCES Dostawca(ID_dostawcy),
CONSTRAINT zl_kl_fk FOREIGN KEY (ID_klienta) REFERENCES Klient(ID_klienta),
CONSTRAINT zl_ma_fk FOREIGN KEY (ID_magazynu) REFERENCES Magazyn(ID_magazynu)
);