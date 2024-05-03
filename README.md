# mr-news
Mária Rádió hírszerkesztői felület

# Cél:

Mária Rádió hírszerkesztői és hírolvasói közös online felületen dolgoznak együtt. Előbbiek megfogalmazzák szövegeket és feltöltik az online felület megfelelő helyére, utóbbiak pedig a kész szövegeket felolvassák. A cél, hogy ez a felület létrejöjjön és a rugalmasan kiszolgálja a hírműsorokkal dolgozó felhasználókat.

# Megoldandó feladatok:

Hitelesítés, jogosítás:
  A felület használatához be kell jelentkezni felhasználó/jelszó párossal.
  Jogosultság függvényében kell a felületet megjeleníteni.
  Jogosultsági körök (szerep): adminisztrátor, hírolvasó, hírszerkesztő.
  Egy felhasználónak lehet több szerepe is. Ha így van, akkor menüpontokban választhatja ki, melyik szerephez tartozó felületet szeretné látni.
  
Felületek:
  Adminisztrátor:
    Lista ablakot lát amiben a felhasználók vannak felsorolva. Soronként megjelenített információ: név, jogosultság, szerkesztő gomb, törlés gomb. Lista ablak tetején új személy hozzáadás opció és beállítások opció.
    Felhasználó kiválasztása esetén felhasználói adatlap szerkeszthető formában, kitöltve: név, szerepek (pipálható chekboxokban az összeset fel kell sorolni), felhasználói név, jelszó helyreállítási opció (nyomógomb, funkciója: új emailt küld megadott címre ideiglenes jelszóval), email cím. Új felhasználó hozzáadásakor minden mező üres. Az űrlap alján mentés gomb - addig nem menthető egy űrlap ameddig nincs minden kitöltve.
    Beállítás opciót választva néhány paramétert lehet módosítani: hírszöveg maximális hossza, cím maximális hossza

  Hírszerkesztő:
    Lista ablakot lát, minden sor egy feltöltött (elkészült) hír címét, a feltöltő nevét, a feltöltés és lejárat idejét, a felolvasások számát valamint törlési opciót tartalmaz. Lista ablak tetején új hír hozzáadás opció.
    Lista ablakban egy hírre kattintva vagy új hír hozzáadást választva szerkesztő űrlapot kap a felhasználó. Kiválasztás esetén az űrlap mezők már ki vannak töltve. Az űrlap tartalma: hír címe önálló többsoros beviteli mezőben karakter számlálóval; hír szövege önálló, többsoros beviteli mezőben, karakter számlálóval, hír lejáratának dátuma.

  Hírolvasó:
    Lista ablakot lát, minden sor egy feltöltött hír címét és szövegét, az eddigi felolvasások számát, a lejárat idejét és a hírszerkesztő nevét tartalmazza. Sor elején checkbox, amivel ki lehet választani felolvasásra az adott híranyagot. A felsorolásban csak azok a hírek jelennek meg, amik még nem jártak le. Az oldalnak fix fejléce van, ahol a kiválasztott hírek össz karakterszáma szerepel, valamint a nyomtatás gomb. 
    A hírek rendezési elve: legfrissebbtől a legrégebbiig, a legkevesebbszer felolvasottól a legtöbbször ismételtig növekvő sorrendben.
    Nyomtatás funkció PDF kimenetet generál a kiválasztott tételekből. A generált fájl tartalma a kiválasztott hírek felsorolása. Minden hírhez tartozik cím, tartalom és a szerkesztőjének neve. A PDF fájl a böngészőn belül jelenjen meg új ablakban. Nyomtatást a felhasználó végzi a saját környezetében.
