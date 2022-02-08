CREATE DATABASE Covid_19;
USE Covid_19;

CREATE TABLE fuqaro_malumotlari(
	 passport_seriya VARCHAR(15) NOT NULL,
     passport_jshr VARCHAR(14)NOT NULL,
	 ism varchar(50) NOT NULL,
	 familya VARCHAR(50) NOT NULL,
     sharifi VARCHAR(50) NOT NULL,
     jinsi VARCHAR(10) NOT NULL,
	 tugulgan_yili DATE NOT NULL,
     yashash_manzili VARCHAR(255) NOT NULL,
     PRIMARY KEY(passport_seriya)
);
CREATE TABLE vaksina(
	id INT NOT NULL AUTO_INCREMENT,
    nomi VARCHAR(50) NOT NULL,
    mavjud_soni INT NOT NULL,
    qabul_qilish_soni INT NOT NULL,
    malumotlari VARCHAR(255) NOT NULL,
    oraliq_kuni INT NOT NULL,
    PRIMARY KEY(id)
    );
    
CREATE TABLE hamshiralar(
	id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(255) NOT NULL,
    parol VARCHAR(255) NOT NULL,
	ism varchar(50) NOT NULL,
	familya VARCHAR(50) NOT NULL,
	tugulgan_yili DATE NOT NULL,
    lavozimi VARCHAR(50) NOT NULL,
	malakasi VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);     

CREATE TABLE vaksina_jarayoni(
	fuqaro_seria VARCHAR(255)	 NOT NULL,
    vaksina_id INT NOT NULL,
    hamshira_id INT NOT NULL,
    sana_vaqti DATE NOT NULL,
    doza INT NOT NULL,
    hozirgi_sana_vaqt DATETIME NOT NULL,
    FOREIGN KEY (fuqaro_seria) REFERENCES fuqaro_malumotlari(passport_seriya),
    FOREIGN KEY (hamshira_id)REFERENCES hamshiralar(id),
    FOREIGN KEY (vaksina_id) REFERENCES vaksina(id),
    PRIMARY KEY(doza)
);

CREATE TABLE sertifikat(
	id INT NOT NULL AUTO_INCREMENT,
    fuqaro_id VARCHAR(255) NOT NULL,
    vaksina_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (fuqaro_id) REFERENCES fuqaro_malumotlari(passport_seriya),
    FOREIGN KEY (vaksina_id)  REFERENCES vaksina(id)
);

INSERT INTO fuqaro_malumotlari(passport_seriya,passport_jshr,ism,familya,sharifi,jinsi,tugulgan_yili,yashash_manzili)
VALUES('AC0537540','51504025440037','Humoyun','Saydullayev','Dilshod ogli','Erkak','2002-04-15','Jizzax viloyati Gallaorol tumani '),
	  ('AB9469170','52504026520016','Mirabzal','Miryusupov','Mirmaxsud ogli','Erkak','2002-04-25','Toshkent shahar Yunusobod tumani '),
      ('AC0250358','51808026610081','Azizxoja','Husanov','Odilxoja ogli','Erkak','2002-08-18','Toshkent shahar Olmozor tumani'),
      ('AB9947539','60706026670011','Dilnoza','Ziyodullayeva','Alisher qizi','Ayol','2002-06-07','Toshkent viloyati Zangiotra tumani'),
      ('AB4740025','73030698560104','Bahodir','Isobayev','Baxtiyor ogli','Erkak','1998-06-03','Namangan viloyati  Namangan shahri'),
      ('AB7748977','30412996140052','Oybek','Malikov','Bahodir ogli','Erkak','2002-12-04','Samarqand viloyati Qoshraobod tumani'),
      ('AC1473870','52510026590034','Rustam','Fozilov','Gayrat ogli','Erkak','2002-10-25','Toshkent shahar Chilonzor tumani'),
      ('AC1668359','50602036800035','Azamjon','Yusupov','Shokir ogli','Erkak','2002-02-06','Toshkent viloyati Ortachirchiq tumani'),
	  ('AB2248734','50803035740041','Dilshodbek','Abduraxmanov','Muzaffar ogli','Erkak','1998-03-08','Qashqadaryo viloyati  Qarshi shahri'),
      ('AB7485676','50402015930021','Fayzullo','Rahmatullayev','Hamidullo ogli','Erkak','1998-02-04','Namangan viloyati  Uychi tumani'),
      ('AB4731481','52102007210022','Ogabek','Komilov','Otabekovich','Erkak','1998-02-21','Xorazm viloyati  Xiva tumani'),
      ('AA0142384','22704966580065','Arofat','Babaniyazova','Saatbay qizi','Ayol','1996-04-27','Toshlent shahar Xamza tumani'),
      ('AB7557310','61608016850010','Ezoza','Saydullayeva','Zokirjon qizi','Ayol','2001-08-16','Toshkent viloyati Bekobod tumani '),
      ('KA1238001','52307027230034','Shohruh','Orinboyev','Fayzullo ogli','Erkak','2002-07-23','Qoraqolpogiston respublikasi Amudaryo tumani ');
SELECT * FROM fuqaro_malumotlari;

INSERT INTO vaksina(nomi,mavjud_soni,qabul_qilish_soni,malumotlari,oraliq_kuni)
VALUES('Xitoy-Ozbekiston ',100,3,'Xitoy va Ozbekiston olimlari tomonidan Corona-virus infeksiyasiga qarshi ishlab samarali vaksina turi',27 ),
      ('Sputnik-V',100,2,'Rossiya olimlari tomonidan Corona-virus infeksiyasiga qarshi samarali va eng birinchi ishlab chiqilganivaksina turi',28),
      ('AStraZeneca',100,2,'Germaniya olimlari tomonidan Corona-virus infeksiyasiga qarshi ishlab samarali vaksina turi',28),
      ('Moderna',100,2,'Amerika Qoshma shtatlari olimlari tomonidan Corona-virus infeksiyasiga qarshi ishlab samarali vaksina turi',28),
	  ('Pfizer',100,2,'Buyuk Biritaniya olimlari tomonidan Corona-virus infeksiyasiga qarshi ishlab samarali vaksina turi',28);
SELECT * FROM vaksina;

INSERT INTO hamshiralar(login,parol,ism,familya,tugulgan_yili,lavozimi,malakasi)
VALUES('Dilfuza','Dilfuza1981','Dilfuza','Mamanazarova','1981-03-22','Hamshira','Oliy'),
	  ('Shoira','Shoira1983','Shoira','Abdullayeva','1983-12-31','Hamshira','1-toifali'),
      ('Muhammad','Muhammad1994','Muhammad','Osimov','1994-11-21','Emlovchi shifokor','1-toifali'),
      ('Shohruh','Shohruh1992','Shohruh','Orinboyev','1992-11-21','Emlovchi shifokor','Oliy');
    