<?php
/**
 * datos/aperturas.php
 * -----------------------------------------------------------------
 * Catálogo de aperturas. Cada apertura usa la misma "ficha", así el
 * contenido queda parejo y la página se genera recorriendo el array
 * (paginas/aperturas.php + includes/componentes.php).
 *
 * Campos de cada apertura (la clave es un identificador sin espacios,
 * que también se usa como ancla: aperturas.php#italiana):
 *
 *   nombre      Nombre de la apertura
 *   tipo        abierta | semiabierta | cerrada | india | flanco
 *               (las descripciones de cada tipo están al final)
 *   eco         Rango de códigos de la clasificación ECO
 *   nivel       Principiante | Intermedio | Avanzado
 *   jugadas     Jugadas iniciales, una por número de jugada
 *   resumen     Presentación e historia breve
 *   idea_blancas / idea_negras   Qué busca cada bando
 *   planes      Planes típicos (lista)
 *   errores     Errores comunes y trampas (lista)
 *   conceptos   Lo que enseña la apertura
 *   jugadores   Jugadores conocidos por usarla
 *
 * Notación algebraica en español: R rey, D dama, T torre, A alfil,
 * C caballo; los peones no llevan letra. "x" = captura, "+" = jaque,
 * "#" = jaque mate, "O-O" = enroque corto. "?" marca un error y "!"
 * una buena jugada.
 * -----------------------------------------------------------------
 */

return [

    /* ===================== ABIERTAS (1.e4 e5) ===================== */

    'italiana' => [
        'nombre'       => 'Apertura Italiana',
        'tipo'         => 'abierta',
        'eco'          => 'C50–C54',
        'nivel'        => 'Principiante',
        'jugadas'      => ['e4 e5', 'Cf3 Cc6', 'Ac4'],
        'resumen'      => 'Una de las formas más antiguas y clásicas de empezar una partida. Ya aparece en tratados italianos del siglo XVI, y a comienzos del siglo XVII Gioachino Greco la popularizó con sus partidas analizadas. Su idea es muy clara: desarrollar rápido las piezas y presionar el punto f7, la casilla más débil de las negras al comienzo porque solo la defiende el rey.',
        'idea_blancas' => 'Desarrollar caballo y alfil hacia el centro, enrocar pronto y preparar el avance c3 + d4 para construir un centro de peones fuerte.',
        'idea_negras'  => 'Responder con el mismo esquema: 3...Ac5 (Giuoco Piano) para apuntar a f2, o 3...Cf6 (Defensa de los Dos Caballos) para contraatacar el peón de e4.',
        'planes'       => [
            'Plan clásico: c3 y d4 para ocupar el centro con dos peones.',
            'Plan lento ("Giuoco Pianissimo"): d3, enroque, Te1 y maniobras de caballo como Cbd2-f1-g3; es el que más se juega hoy en la élite.',
            'Para las negras: enrocar, jugar ...d6 y buscar la ruptura ...d5 en el momento justo.',
        ],
        'errores'      => [
            'Trampa de Blackburne-Shilling: tras 3...Cd4, capturar 4.Cxe5? permite 4...Dg5!, que ataca el caballo y el peón de g2. Si 5.Cxf7, sigue 5...Dxg2 6.Tf1 Dxe4+ 7.Ae2 Cf3#. Lo correcto es 4.O-O o 4.c3.',
            'Atacar f7 con Cg5 antes de tiempo, sin apoyo: si el ataque no funciona, las blancas solo pierden tiempo con el caballo.',
        ],
        'conceptos'    => 'Desarrollo rápido, control del centro, enroque temprano y cómo presionar un punto débil del rival desde la apertura.',
        'jugadores'    => 'Gioachino Greco en el siglo XVII; hoy Magnus Carlsen y Fabiano Caruana la juegan con frecuencia en torneos de élite.',
    ],

    'dos-caballos' => [
        'nombre'       => 'Defensa de los Dos Caballos',
        'tipo'         => 'abierta',
        'eco'          => 'C55–C59',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['e4 e5', 'Cf3 Cc6', 'Ac4 Cf6'],
        'resumen'      => 'En lugar de copiar el desarrollo blanco con 3...Ac5, las negras contraatacan de inmediato el peón de e4. Es una de las respuestas más agudas a la Apertura Italiana y lleva a posiciones tácticas para ambos bandos.',
        'idea_blancas' => 'Aprovechar el punto f7: la jugada más directa es 4.Cg5, que lo ataca con dos piezas. Las alternativas tranquilas son 4.d3 y 4.d4.',
        'idea_negras'  => 'Presionar e4 y, si las blancas atacan f7, defenderse con 4...d5 y aceptar entregar un peón a cambio de desarrollo rápido.',
        'planes'       => [
            'Tras 4.Cg5 d5 5.exd5, la respuesta principal es 5...Ca5!: las negras atacan el alfil y obtienen juego activo a cambio del peón.',
            'Con 4.d3, la partida se parece a una Italiana tranquila, con maniobras y sin choques inmediatos.',
        ],
        'errores'      => [
            'El "Hígado frito": tras 4.Cg5 d5 5.exd5, recapturar 5...Cxd5? permite 6.Cxf7! Rxf7 7.Df3+, con el rey negro expuesto en el centro.',
        ],
        'conceptos'    => 'Contraataque en lugar de defensa pasiva, compensación por material (desarrollo a cambio de un peón) y cálculo táctico.',
        'jugadores'    => 'Muy estudiada desde el siglo XIX; sigue siendo una opción habitual en partidas rápidas.',
    ],

    'espanola' => [
        'nombre'       => 'Apertura Española (Ruy López)',
        'tipo'         => 'abierta',
        'eco'          => 'C60–C99',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['e4 e5', 'Cf3 Cc6', 'Ab5'],
        'resumen'      => 'Lleva el nombre de Ruy López de Segura, sacerdote español que la analizó en un libro de 1561. Es una de las aperturas más estudiadas de la historia y se juega en todos los niveles, desde principiantes hasta campeones del mundo.',
        'idea_blancas' => 'El alfil en b5 ataca al caballo que defiende el peón de e5. No gana nada de inmediato, pero genera una presión posicional que dura toda la partida.',
        'idea_negras'  => 'Lo más común es 3...a6 (Variante Morphy), que pregunta al alfil qué quiere hacer. La Defensa Berlinesa (3...Cf6) es muy sólida y lleva a finales técnicos.',
        'planes'       => [
            'Blancas: enroque, Te1, c3 y d4 para dominar el centro, y la maniobra Cbd2-f1-g3 para llevar el caballo al flanco de rey.',
            'Negras: ...b5 para echar al alfil, ...d6 para sostener e5 y, en muchas líneas, la ruptura ...d5.',
        ],
        'errores'      => [
            'Ganar el peón de forma ingenua: tras 3...a6 4.Axc6 dxc6 5.Cxe5? llega 5...Dd4!, que ataca el caballo y el peón de e4 a la vez, y las negras recuperan el material.',
        ],
        'conceptos'    => 'Presión posicional sostenida, juego paciente y la importancia de una pieza bien colocada aunque no ataque de forma directa.',
        'jugadores'    => 'Bobby Fischer fue un gran especialista. La Berlinesa se hizo famosa cuando Vladimir Kramnik la usó contra Garry Kasparov en el Campeonato del Mundo de 2000.',
    ],

    'escocesa' => [
        'nombre'       => 'Apertura Escocesa',
        'tipo'         => 'abierta',
        'eco'          => 'C44–C45',
        'nivel'        => 'Principiante',
        'jugadas'      => ['e4 e5', 'Cf3 Cc6', 'd4 exd4', 'Cxd4'],
        'resumen'      => 'Su nombre viene de una partida por correspondencia entre Edimburgo y Londres jugada en 1824. Las blancas abren el centro desde el principio, en lugar de prepararlo lentamente como en la Española.',
        'idea_blancas' => 'Cambiar el peón de e5, ganar espacio y conseguir un juego libre y activo para las piezas.',
        'idea_negras'  => 'Desarrollarse rápido y presionar al caballo de d4 con 4...Ac5 o 4...Cf6.',
        'planes'       => [
            'Blancas: desarrollo rápido, enroque y aprovechar el espacio extra en el centro.',
            'Negras: atacar el caballo centralizado y buscar contrajuego antes de que las blancas consoliden.',
        ],
        'errores'      => [
            'Recapturar 4.Dxd4?? en la cuarta jugada: el caballo de c6 la captura con 4...Cxd4 y las blancas pierden la dama. Por eso se recaptura con el caballo.',
        ],
        'conceptos'    => 'Abrir el centro a tiempo, juego libre de piezas y cuándo conviene cambiar peones centrales.',
        'jugadores'    => 'Garry Kasparov la revivió en los años noventa y la usó en partidas de Campeonato del Mundo.',
    ],

    'gambito-rey' => [
        'nombre'       => 'Gambito de Rey',
        'tipo'         => 'abierta',
        'eco'          => 'C30–C39',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['e4 e5', 'f4'],
        'resumen'      => 'La apertura más popular del ajedrez romántico del siglo XIX, cuando se jugaba a atacar a toda costa. La famosa "Partida Inmortal" de Anderssen (1851) empezó con un Gambito de Rey.',
        'idea_blancas' => 'Ofrecer el peón de f4 para desviar el peón de e5, levantar el centro con d4 y usar la columna f abierta para atacar.',
        'idea_negras'  => 'Aceptar el peón (2...exf4) y defenderlo con ...g5, o devolverlo con ...d5 para desarrollarse. También se puede rehusar con 2...Ac5.',
        'planes'       => [
            'Blancas: d4, Ac4 y enroque rápido para atacar sobre la columna f.',
            'Negras: no aferrarse al peón de más a cualquier precio; devolverlo a tiempo suele ser la mejor defensa.',
        ],
        'errores'      => [
            'Para las blancas: olvidar que el rey queda expuesto en la diagonal e1-h4; muchas líneas incluyen el jaque ...Dh4+.',
            'Para las negras: defender el peón de más y retrasar el desarrollo; las blancas aprovechan el tiempo para atacar.',
        ],
        'conceptos'    => 'El concepto de gambito (material a cambio de iniciativa), las columnas abiertas y la seguridad del rey.',
        'jugadores'    => 'Adolf Anderssen y Paul Morphy en el siglo XIX; Boris Spassky le ganó con ella a Bobby Fischer en 1960.',
    ],

    'petrov' => [
        'nombre'       => 'Defensa Petrov (Defensa Rusa)',
        'tipo'         => 'abierta',
        'eco'          => 'C42–C43',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['e4 e5', 'Cf3 Cf6'],
        'resumen'      => 'Lleva el nombre del maestro ruso Alexander Petrov, que la analizó en el siglo XIX. En vez de defender su peón de e5, las negras contraatacan el peón de e4. Es una de las defensas más sólidas contra 1.e4.',
        'idea_blancas' => 'Conseguir una pequeña ventaja de desarrollo en una posición simétrica, normalmente con 3.Cxe5 o 3.d4.',
        'idea_negras'  => 'Igualar con seguridad: posiciones simétricas, con pocas debilidades y difíciles de perder.',
        'planes'       => [
            'Tras 3.Cxe5, primero 3...d6 echa al caballo y recién después 4...Cxe4 recupera el peón.',
            'Ambos bandos suelen enrocar corto y luchar por la columna e, que queda semiabierta.',
        ],
        'errores'      => [
            'Copiar la jugada blanca: 3.Cxe5 Cxe4? 4.De2! y, si 4...Cf6??, llega 5.Cc6+, jaque descubierto que gana la dama de d8.',
        ],
        'conceptos'    => 'Simetría, contraataque en lugar de defensa y la diferencia entre jugar seguro y jugar pasivo.',
        'jugadores'    => 'Anatoli Karpov y Vladimir Kramnik la usaron con frecuencia por su solidez.',
    ],

    'vienesa' => [
        'nombre'       => 'Apertura Vienesa',
        'tipo'         => 'abierta',
        'eco'          => 'C25–C29',
        'nivel'        => 'Principiante',
        'jugadas'      => ['e4 e5', 'Cc3'],
        'resumen'      => 'Popular entre los jugadores de Viena en el siglo XIX. El caballo sale a c3, en lugar de f3, para defender el peón de e4 y dejar libre el peón de f para un avance posterior.',
        'idea_blancas' => 'Preparar f4 en buenas condiciones (el Gambito Vienés) o jugar un sistema tranquilo con g3 y Ag2.',
        'idea_negras'  => 'Desarrollarse con 2...Cf6 o 2...Cc6 y responder al centro blanco con la ruptura ...d5.',
        'planes'       => [
            'Blancas: f4 para abrir la columna f, como en el Gambito de Rey pero con el caballo ya desarrollado.',
            'Negras: liberar el juego con ...d5 apenas sea posible.',
        ],
        'errores'      => [
            'Para las negras: descuidar el punto f7 ante un alfil en c4 y la dama blanca saliendo a h5 o f3.',
        ],
        'conceptos'    => 'Flexibilidad, preparar un avance en lugar de jugarlo de inmediato y la relación con el Gambito de Rey.',
        'jugadores'    => 'Muy usada en el siglo XIX; hoy aparece a menudo en partidas rápidas como alternativa a las líneas más teóricas.',
    ],

    /* ================= SEMIABIERTAS (1.e4, sin 1...e5) ================= */

    'siciliana' => [
        'nombre'       => 'Defensa Siciliana',
        'tipo'         => 'semiabierta',
        'eco'          => 'B20–B99',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['e4 c5'],
        'resumen'      => 'La respuesta más popular y combativa contra 1.e4. Su nombre viene de autores sicilianos del siglo XVII. En vez de responder de forma simétrica, las negras luchan por el centro desde el flanco.',
        'idea_blancas' => 'Lo más común es la Siciliana Abierta (2.Cf3, 3.d4 y 4.Cxd4): las blancas consiguen ventaja de desarrollo y espacio, y suelen atacar en el flanco de rey.',
        'idea_negras'  => 'Cambiar el peón de c por el peón de d blanco: así logran mayoría de peones en el centro y la columna c semiabierta para contraatacar en el flanco de dama.',
        'planes'       => [
            'Es una familia enorme de variantes: Najdorf (5...a6), Dragón (con ...g6 y el alfil en g7) y Sveshnikov, entre otras.',
            'Es frecuente el enroque en lados opuestos: el que ataca primero suele ganar.',
        ],
        'errores'      => [
            'Para las negras: desarrollarse de forma lenta y pasiva; sin contraataque, el ataque blanco en el flanco de rey suele ser muy fuerte.',
        ],
        'conceptos'    => 'Juego asimétrico, lucha por el centro sin ocuparlo directamente y la importancia de las columnas semiabiertas.',
        'jugadores'    => 'Bobby Fischer y Garry Kasparov fueron grandes defensores de la Variante Najdorf.',
    ],

    'francesa' => [
        'nombre'       => 'Defensa Francesa',
        'tipo'         => 'semiabierta',
        'eco'          => 'C00–C19',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['e4 e6', 'd4 d5'],
        'resumen'      => 'Debe su nombre a una partida por correspondencia entre París y Londres de 1834, en la que los franceses la usaron con éxito. Es una apertura sólida y algo cerrada: las negras aceptan un poco menos de espacio a cambio de una estructura de peones muy resistente.',
        'idea_blancas' => 'Mantener la ventaja de espacio. Las líneas principales son 3.Cc3, 3.Cd2 y la Variante del Avance (3.e5).',
        'idea_negras'  => 'Atacar el centro blanco con d5 apoyado en e6, y después romper la cadena de peones con ...c5 y ...f6.',
        'planes'       => [
            'Negras: ...c5 para atacar la base de la cadena blanca (el peón de d4).',
            'Blancas: aprovechar el espacio para atacar en el flanco de rey.',
        ],
        'errores'      => [
            'El punto débil de la Francesa es el alfil de casillas claras de las negras (c8), encerrado detrás de sus propios peones. Olvidarse de activarlo o cambiarlo suele dejar a las negras pasivas.',
        ],
        'conceptos'    => 'Cadenas de peones, juego posicional cerrado y la importancia de saber cuándo abrir o mantener cerrada la posición.',
        'jugadores'    => 'Mijaíl Botvinnik y Víktor Korchnói fueron grandes especialistas.',
    ],

    'caro-kann' => [
        'nombre'       => 'Defensa Caro-Kann',
        'tipo'         => 'semiabierta',
        'eco'          => 'B10–B19',
        'nivel'        => 'Principiante',
        'jugadas'      => ['e4 c6', 'd4 d5'],
        'resumen'      => 'Lleva el nombre de Horatio Caro y Marcus Kann, que la analizaron a fines del siglo XIX. Es una defensa muy sólida contra 1.e4, apreciada por jugadores que prefieren posiciones seguras.',
        'idea_blancas' => 'Ganar espacio con la Variante del Avance (3.e5) o desarrollarse rápido con 3.Cc3, la variante clásica.',
        'idea_negras'  => 'Desafiar el centro con d5, como en la Francesa, pero dejando libre el alfil de c8, que suele salir a f5 o g4 antes de jugar ...e6.',
        'planes'       => [
            'Línea clásica: 3.Cc3 dxe4 4.Cxe4 Af5, con desarrollo armonioso y una estructura sin debilidades.',
            'Negras: buscar la ruptura ...c5 para liberar el juego.',
        ],
        'errores'      => [
            'Una trampa famosa: 3.Cc3 dxe4 4.Cxe4 Cd7 5.De2 Cgf6?? 6.Cd6#. Es jaque mate porque el peón de e7 está clavado por la dama blanca y no puede capturar en d6.',
        ],
        'conceptos'    => 'Solidez estructural, cómo desafiar el centro sin asumir riesgos excesivos y la importancia de una buena estructura de peones a largo plazo.',
        'jugadores'    => 'José Raúl Capablanca, Anatoli Karpov y Viswanathan Anand la usaron en partidas importantes.',
    ],

    'escandinava' => [
        'nombre'       => 'Defensa Escandinava',
        'tipo'         => 'semiabierta',
        'eco'          => 'B01',
        'nivel'        => 'Principiante',
        'jugadas'      => ['e4 d5', 'exd5 Dxd5', 'Cc3'],
        'resumen'      => 'Una de las aperturas más antiguas que se conocen: la partida registrada más antigua del ajedrez moderno, jugada en Valencia en 1475, empezó así. Las negras desafían el peón de e4 desde la primera jugada.',
        'idea_blancas' => 'Ganar tiempo atacando a la dama negra, que salió temprano, mientras se desarrollan las piezas (3.Cc3).',
        'idea_negras'  => 'Retirar la dama a una casilla segura (a5, d6 o d8) y desarrollarse rápido, con una estructura sencilla y sin debilidades.',
        'planes'       => [
            'Negras: desarrollo con ...Cf6, ...Af5 o ...Ag4, ...c6 y ...e6.',
            'Blancas: aprovechar los tiempos que gana atacando a la dama para tomar ventaja de desarrollo.',
        ],
        'errores'      => [
            'Para las negras: mover la dama una y otra vez. Cada jugada de dama es un tiempo que no se usa para desarrollar otra pieza.',
        ],
        'conceptos'    => 'El valor del tiempo en la apertura y los riesgos de sacar la dama temprano.',
        'jugadores'    => 'Sergei Tiviakov es uno de sus grandes especialistas actuales.',
    ],

    'pirc' => [
        'nombre'       => 'Defensa Pirc',
        'tipo'         => 'semiabierta',
        'eco'          => 'B07–B09',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['e4 d6', 'd4 Cf6', 'Cc3 g6'],
        'resumen'      => 'Lleva el nombre del maestro esloveno Vasja Pirc. Es una defensa "hipermoderna": en lugar de ocupar el centro con peones, las negras dejan que las blancas lo ocupen para atacarlo después.',
        'idea_blancas' => 'Aprovechar el centro con peones grandes. La línea más agresiva es el Ataque Austríaco (4.f4).',
        'idea_negras'  => 'Fianchetto del alfil en g7, enroque y golpes contra el centro con ...c5 o ...e5.',
        'planes'       => [
            'Negras: presionar el centro blanco desde lejos con el alfil de g7 y rupturas de peón.',
            'Blancas: avanzar e5 en el momento justo para echar al caballo de f6.',
        ],
        'errores'      => [
            'Para las negras: quedarse demasiado pasivas. Si nunca atacan el centro, las blancas avanzan e5 y ganan mucho espacio.',
        ],
        'conceptos'    => 'Ideas hipermodernas, el fianchetto y cómo controlar el centro con piezas en lugar de peones.',
        'jugadores'    => 'Muy usada por jugadores que buscan posiciones complejas y desequilibradas.',
    ],

    'alekhine' => [
        'nombre'       => 'Defensa Alekhine',
        'tipo'         => 'semiabierta',
        'eco'          => 'B02–B05',
        'nivel'        => 'Avanzado',
        'jugadas'      => ['e4 Cf6'],
        'resumen'      => 'Alexander Alekhine, campeón del mundo, la popularizó en 1921. Las negras atacan el peón de e4 con el caballo para provocar que los peones blancos avancen.',
        'idea_blancas' => 'Perseguir al caballo con los peones (e5, c4, d4) y ganar mucho espacio. La línea más ambiciosa es el Ataque de los Cuatro Peones (con f4).',
        'idea_negras'  => 'Dejar que los peones blancos avancen para después atacarlos, cuando estén sobreextendidos y sean difíciles de defender.',
        'planes'       => [
            'Negras: ...d6 para atacar el peón de e5 y presionar el centro con piezas.',
            'Blancas: consolidar el espacio antes de que las negras organicen el contraataque.',
        ],
        'errores'      => [
            'Para las blancas: avanzar todos los peones sin desarrollar las piezas.',
            'Para las negras: mover el caballo una y otra vez sin desarrollar el resto.',
        ],
        'conceptos'    => 'Provocación, peones sobreextendidos y la diferencia entre tener espacio y poder mantenerlo.',
        'jugadores'    => 'Alexander Alekhine; más tarde Bent Larsen la usó en torneos de primer nivel.',
    ],

    'moderna' => [
        'nombre'       => 'Defensa Moderna',
        'tipo'         => 'semiabierta',
        'eco'          => 'B06',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['e4 g6'],
        'resumen'      => 'Pariente cercana de la Pirc: las negras hacen el fianchetto del alfil de rey de inmediato y retrasan la salida del caballo a f6, lo que les da todavía más flexibilidad.',
        'idea_blancas' => 'Construir un centro amplio con d4, Cc3 y, a veces, f4.',
        'idea_negras'  => 'Mantener las opciones abiertas: según cómo se ubiquen las blancas, eligen entre ...d6, ...c6 o ...c5 para atacar el centro.',
        'planes'       => [
            'Negras: el alfil de g7 presiona las casillas centrales y el flanco de dama blanco.',
            'Blancas: desarrollarse con naturalidad y no dejar que la flexibilidad negra las confunda.',
        ],
        'errores'      => [
            'Para las negras: confiar solo en la flexibilidad y nunca desafiar el centro.',
        ],
        'conceptos'    => 'Flexibilidad, el fianchetto y la relación entre distintas aperturas que comparten las mismas ideas.',
        'jugadores'    => 'Muy usada por jugadores que prefieren evitar la teoría de memoria.',
    ],

    /* ===================== CERRADAS (1.d4 d5) ===================== */

    'gambito-dama' => [
        'nombre'       => 'Gambito de Dama',
        'tipo'         => 'cerrada',
        'eco'          => 'D06–D69',
        'nivel'        => 'Principiante',
        'jugadas'      => ['d4 d5', 'c4'],
        'resumen'      => 'Una de las aperturas más antiguas y respetadas, presente en casi todos los Campeonatos del Mundo. Las blancas ofrecen el peón de c4 para desviar el peón negro de d5 y quedarse con el centro. Da nombre a la serie "Gambito de dama" (2020).',
        'idea_blancas' => 'Si las negras capturan en c4, las blancas suelen recuperar el peón poco después gracias a su control central. No es un sacrificio real, sino una forma de ganar tiempo y espacio.',
        'idea_negras'  => 'Tres respuestas principales: aceptarlo (2...dxc4, Gambito de Dama Aceptado), rehusarlo manteniendo el centro (2...e6, Gambito de Dama Rehusado) o defenderlo con 2...c6 (Defensa Eslava).',
        'planes'       => [
            'Blancas: desarrollo con Cc3, Cf3 y Ag5, y presión sobre el centro y la columna c.',
            'Negras: mantener el peón de d5 y liberar el juego con ...c5 o ...e5 en el momento oportuno.',
        ],
        'errores'      => [
            'En el Gambito Aceptado: intentar conservar el peón de c4 con ...b5. Normalmente debilita el flanco de dama y las blancas lo recuperan con a4.',
            'Trampa del Elefante, en el Gambito Rehusado: 2...e6 3.Cc3 Cf6 4.Ag5 Cbd7 5.cxd5 exd5 6.Cxd5?? Cxd5! 7.Axd8 Ab4+ 8.Dd2 Axd2+ 9.Rxd2 Rxd8. Parecía que el caballo de f6 estaba clavado, pero las negras recuperan la dama y quedan con una pieza de más.',
        ],
        'conceptos'    => 'Control central con peones, el concepto de gambito y cómo el material temporal puede traducirse en ventaja posicional.',
        'jugadores'    => 'Fue protagonista de los duelos entre Garry Kasparov y Anatoli Karpov, y sigue siendo una de las aperturas más jugadas en la élite.',
    ],

    'eslava' => [
        'nombre'       => 'Defensa Eslava',
        'tipo'         => 'cerrada',
        'eco'          => 'D10–D19',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['d4 d5', 'c4 c6'],
        'resumen'      => 'Una de las respuestas más sólidas al Gambito de Dama. Se popularizó en los años treinta, cuando Alexander Alekhine y Max Euwe la usaron en sus duelos por el Campeonato del Mundo. Debe su nombre a los numerosos jugadores eslavos que la desarrollaron.',
        'idea_blancas' => 'Mantener la presión sobre el centro con Cc3 y Cf3 y recuperar el peón de c4 si las negras lo capturan.',
        'idea_negras'  => 'Defender d5 con el peón de c6 en lugar de con ...e6, para que el alfil de casillas claras pueda salir a f5 o g4 antes de cerrarle el camino.',
        'planes'       => [
            'Negras: ...dxc4 en el momento justo y desarrollar el alfil a f5 antes de jugar ...e6.',
            'Blancas: a4 para impedir que las negras defiendan el peón de c4 con ...b5.',
        ],
        'errores'      => [
            'Para las negras: encerrar el alfil de c8 jugando ...e6 demasiado pronto; se pierde la principal ventaja de la Eslava sobre el Gambito Rehusado.',
        ],
        'conceptos'    => 'Cómo resolver el problema del alfil "malo", la solidez estructural y el orden de jugadas.',
        'jugadores'    => 'Alexander Alekhine y Max Euwe en los años treinta; hoy sigue siendo habitual en la élite.',
    ],

    'londres' => [
        'nombre'       => 'Sistema Londres',
        'tipo'         => 'cerrada',
        'eco'          => 'D00, D02, A46, A48',
        'nivel'        => 'Principiante',
        'jugadas'      => ['d4 d5', 'Af4 Cf6', 'e3'],
        'resumen'      => 'Su nombre viene del torneo de Londres de 1922, donde se jugó varias veces. Es un "sistema": las blancas ubican sus piezas casi siempre igual (d4, Af4, e3, Cf3, c3, Ad3 y Cbd2), sin importar lo que hagan las negras. Por eso es muy popular entre quienes no quieren estudiar mucha teoría.',
        'idea_blancas' => 'Armar una estructura sólida en forma de pirámide (c3-d4-e3) con el alfil fuera de la cadena, en f4, y después atacar en el flanco de rey o romper con e4.',
        'idea_negras'  => 'Aprovechar que las blancas juegan de forma tranquila: atacar el centro con ...c5 y presionar el peón de b2, que quedó sin la defensa del alfil.',
        'planes'       => [
            'Blancas: Ce5 apoyado por f4 en algunas líneas, o la ruptura e4 cuando las piezas están listas.',
            'Negras: ...c5, ...Cc6 y ...Db6 para presionar b2 y d4 a la vez.',
        ],
        'errores'      => [
            'Para las blancas: jugar siempre lo mismo sin mirar al rival. Si el alfil de f4 sale y nadie defiende b2, la jugada ...Db6 suele ganar un peón.',
        ],
        'conceptos'    => 'Jugar por sistema, estructuras de peones sólidas y la importancia de no olvidar las debilidades que deja cada pieza al salir.',
        'jugadores'    => 'Hoy es una de las aperturas más jugadas en partidas online; Magnus Carlsen la usó en torneos de élite.',
    ],

    'colle' => [
        'nombre'       => 'Sistema Colle',
        'tipo'         => 'cerrada',
        'eco'          => 'D04–D05',
        'nivel'        => 'Principiante',
        'jugadas'      => ['d4 d5', 'Cf3 Cf6', 'e3'],
        'resumen'      => 'Lleva el nombre del maestro belga Edgard Colle, que lo jugó con éxito en los años veinte. Como el Sistema Londres, es un esquema de desarrollo fijo, pero con el alfil de casillas oscuras dentro de la cadena de peones.',
        'idea_blancas' => 'Desarrollar con e3, Ad3, Cbd2, O-O y c3, para después romper en el centro con e4 y abrir líneas hacia el rey negro.',
        'idea_negras'  => 'Desarrollarse con naturalidad e impedir o neutralizar la ruptura e4, por ejemplo con ...c5 y el alfil de dama en fianchetto (...b6 y ...Ab7).',
        'planes'       => [
            'Blancas: la ruptura e4 es la clave de todo el sistema; sin ella, la posición blanca queda pasiva.',
            'Negras: presionar el centro antes de que las blancas completen su desarrollo.',
        ],
        'errores'      => [
            'Para las blancas: olvidar la ruptura e4 y quedarse esperando; el alfil de c1 queda encerrado detrás de sus peones.',
        ],
        'conceptos'    => 'Esquemas de desarrollo, la importancia de las rupturas de peón y el problema de las piezas encerradas.',
        'jugadores'    => 'Edgard Colle y, más tarde, George Koltanowski lo difundieron entre jugadores de club.',
    ],

    'catalana' => [
        'nombre'       => 'Apertura Catalana',
        'tipo'         => 'cerrada',
        'eco'          => 'E01–E09',
        'nivel'        => 'Avanzado',
        'jugadas'      => ['d4 d5', 'c4 e6', 'Cf3 Cf6', 'g3'],
        'resumen'      => 'Savielly Tartakower la presentó en el torneo de Barcelona de 1929, y de ahí viene su nombre. Combina el Gambito de Dama con el fianchetto del alfil de rey blanco.',
        'idea_blancas' => 'Colocar el alfil en g2 para presionar la gran diagonal hacia d5 y el flanco de dama negro, con una presión posicional muy duradera.',
        'idea_negras'  => 'Liberar el juego con ...dxc4 y ...c5, o mantener una estructura sólida y neutralizar el alfil de g2.',
        'planes'       => [
            'Blancas: recuperar el peón de c4 si las negras lo toman y explotar la presión del alfil sobre la diagonal larga.',
            'Negras: completar el desarrollo del alfil de c8, la pieza que más cuesta activar.',
        ],
        'errores'      => [
            'Para las negras: aferrarse al peón de c4 con ...b5; abre la diagonal del alfil de g2 sobre la torre de a8.',
        ],
        'conceptos'    => 'Fianchetto, presión sobre diagonales largas y ventajas posicionales pequeñas pero duraderas.',
        'jugadores'    => 'Vladimir Kramnik fue uno de sus grandes especialistas, por ejemplo en su Campeonato del Mundo contra Veselin Topalov (2006).',
    ],

    /* ============ INDIAS Y OTRAS DEFENSAS CONTRA 1.d4 ============ */

    'india-rey' => [
        'nombre'       => 'Defensa India de Rey',
        'tipo'         => 'india',
        'eco'          => 'E60–E99',
        'nivel'        => 'Avanzado',
        'jugadas'      => ['d4 Cf6', 'c4 g6', 'Cc3 Ag7', 'e4 d6'],
        'resumen'      => 'Una defensa combativa y "hipermoderna": las negras dejan que las blancas armen un gran centro de peones para atacarlo después. Suele llevar a partidas muy tácticas, con ataques en flancos opuestos.',
        'idea_blancas' => 'Aprovechar la ventaja de espacio y atacar en el flanco de dama, donde las blancas tienen más terreno, con avances como c5.',
        'idea_negras'  => 'Golpear el centro con ...e5 (o ...c5) y, si el centro se cierra, lanzar un ataque en el flanco de rey con ...f5 y ...f4.',
        'planes'       => [
            'Con el centro cerrado (peones en d5 y e5), es una carrera: las blancas atacan en el flanco de dama y las negras en el de rey.',
            'Negras: el alfil de g7 es su pieza clave; conviene no cambiarlo sin motivo.',
        ],
        'errores'      => [
            'Para las negras: quedarse sin contraataque. Si nunca golpean el centro, el espacio blanco termina asfixiando la posición.',
        ],
        'conceptos'    => 'Ideas hipermodernas, el fianchetto, cadenas de peones y ataques en flancos opuestos.',
        'jugadores'    => 'Bobby Fischer y Garry Kasparov la convirtieron en un arma de primer nivel.',
    ],

    'nimzoindia' => [
        'nombre'       => 'Defensa Nimzoindia',
        'tipo'         => 'india',
        'eco'          => 'E20–E59',
        'nivel'        => 'Avanzado',
        'jugadas'      => ['d4 Cf6', 'c4 e6', 'Cc3 Ab4'],
        'resumen'      => 'Creada por Aron Nimzowitsch, uno de los grandes teóricos del ajedrez, en la primera mitad del siglo XX. Es considerada una de las defensas más sólidas y flexibles contra 1.d4.',
        'idea_blancas' => 'Ganar la pareja de alfiles y el centro, aunque a cambio puedan quedar con peones doblados en c3.',
        'idea_negras'  => 'Clavar el caballo de c3 para impedir que apoye el avance e4, y si conviene cambiar el alfil por ese caballo para dejar a las blancas con peones doblados.',
        'planes'       => [
            'Negras: controlar la casilla e4 con piezas y presionar los peones débiles de c3 y c4.',
            'Blancas: abrir la posición para que los dos alfiles muestren su fuerza.',
        ],
        'errores'      => [
            'Para las negras: cambiar el alfil por el caballo sin ganar nada a cambio; los dos alfiles blancos pueden ser muy fuertes en posiciones abiertas.',
        ],
        'conceptos'    => 'La clavada como arma estratégica, la pareja de alfiles contra la estructura de peones y el control de casillas clave.',
        'jugadores'    => 'Aron Nimzowitsch; más tarde, Anatoli Karpov y Garry Kasparov la usaron a menudo.',
    ],

    'india-dama' => [
        'nombre'       => 'Defensa India de Dama',
        'tipo'         => 'india',
        'eco'          => 'E12–E19',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['d4 Cf6', 'c4 e6', 'Cf3 b6'],
        'resumen'      => 'La compañera habitual de la Nimzoindia: si las blancas evitan Cc3, las negras colocan el alfil de dama en fianchetto. Es una defensa sólida y de corte posicional.',
        'idea_blancas' => 'Conseguir el avance e4 y una pequeña ventaja de espacio, a menudo también con fianchetto (g3 y Ag2).',
        'idea_negras'  => 'Controlar la casilla e4 con el alfil de b7 y el caballo de f6, impidiendo que las blancas ocupen el centro con peones.',
        'planes'       => [
            'Lucha por la casilla e4: el bando que la controla suele tener la mejor posición.',
            'Negras: rupturas ...c5 o ...d5 para liberar el juego.',
        ],
        'errores'      => [
            'Para las negras: permitir e4 sin resistencia; el alfil de b7 queda apuntando a una pared de peones.',
        ],
        'conceptos'    => 'El control de una casilla central con piezas en lugar de peones y el fianchetto del alfil de dama.',
        'jugadores'    => 'Anatoli Karpov fue uno de sus grandes especialistas.',
    ],

    'grunfeld' => [
        'nombre'       => 'Defensa Grünfeld',
        'tipo'         => 'india',
        'eco'          => 'D70–D99',
        'nivel'        => 'Avanzado',
        'jugadas'      => ['d4 Cf6', 'c4 g6', 'Cc3 d5'],
        'resumen'      => 'El maestro austríaco Ernst Grünfeld la introdujo en 1922. La llamada "Partida del Siglo", que Bobby Fischer ganó con 13 años a Donald Byrne en 1956, empezó con una Grünfeld.',
        'idea_blancas' => 'Aceptar el desafío y construir un gran centro de peones: por ejemplo 4.cxd5 Cxd5 5.e4 Cxc3 6.bxc3, con peones en c3, d4 y e4.',
        'idea_negras'  => 'Dejar que las blancas tengan ese centro para atacarlo de inmediato con el alfil de g7, el golpe ...c5 y la presión de las piezas.',
        'planes'       => [
            'Negras: presión constante sobre d4 con ...c5, ...Cc6 y ...Ag4.',
            'Blancas: sostener el centro y, si se puede, avanzar d5 para ganar espacio.',
        ],
        'errores'      => [
            'Para las negras: dejar que el centro blanco se consolide sin atacarlo; un centro sólido de peones aplasta a las piezas negras.',
        ],
        'conceptos'    => 'Centro de peones contra presión de piezas, el fianchetto y el juego dinámico.',
        'jugadores'    => 'Bobby Fischer y Garry Kasparov la usaron en partidas memorables.',
    ],

    'benoni' => [
        'nombre'       => 'Benoni Moderna',
        'tipo'         => 'india',
        'eco'          => 'A60–A79',
        'nivel'        => 'Avanzado',
        'jugadas'      => ['d4 Cf6', 'c4 c5', 'd5 e6'],
        'resumen'      => 'Una defensa muy desequilibrada: las negras aceptan una estructura de peones con desventaja de espacio a cambio de juego activo y oportunidades tácticas.',
        'idea_blancas' => 'Usar la mayoría de peones en el centro para avanzar e4 y e5, y aprovechar la ventaja de espacio.',
        'idea_negras'  => 'Usar la mayoría de peones en el flanco de dama (...a6 y ...b5) y la presión del alfil de g7 sobre la gran diagonal.',
        'planes'       => [
            'Es una carrera de mayorías: las blancas en el centro y las negras en el flanco de dama.',
            'Negras: la casilla e5 suele ser un buen puesto para un caballo.',
        ],
        'errores'      => [
            'Para las negras: jugar de forma pasiva. En la Benoni, la falta de actividad se paga muy caro por la desventaja de espacio.',
        ],
        'conceptos'    => 'Mayorías de peones, desequilibrios y la compensación dinámica frente a una desventaja estructural.',
        'jugadores'    => 'Mijaíl Tal la usó con su estilo de ataque característico.',
    ],

    'holandesa' => [
        'nombre'       => 'Defensa Holandesa',
        'tipo'         => 'india',
        'eco'          => 'A80–A99',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['d4 f5'],
        'resumen'      => 'Recomendada por el jugador neerlandés Elias Stein a fines del siglo XVIII, de ahí su nombre. Las negras controlan la casilla e4 con un peón desde la primera jugada, a costa de debilitar un poco la protección de su rey.',
        'idea_blancas' => 'Aprovechar la debilidad de la diagonal e8-h5 y del flanco de rey negro, y desarrollarse con fianchetto (g3 y Ag2).',
        'idea_negras'  => 'Controlar e4 y atacar en el flanco de rey. Sus formaciones más conocidas son la "Leningrado" (con ...g6) y el "Muro de Piedra" (peones en c6, d5, e6 y f5).',
        'planes'       => [
            'Negras: ...Cf6, ...e6 o ...g6, enroque y ataque con piezas hacia el flanco de rey.',
            'Blancas: la ruptura e4 para abrir el centro y castigar la debilidad del rey negro.',
        ],
        'errores'      => [
            'Para las negras: adelantar también los peones de g y h sin cuidar la diagonal e8-h5, por donde la dama blanca puede dar jaque.',
        ],
        'conceptos'    => 'Control de una casilla central con un peón de flanco, estructuras como el Muro de Piedra y el equilibrio entre ataque y seguridad del rey.',
        'jugadores'    => 'Mijaíl Botvinnik la usó en partidas de Campeonato del Mundo.',
    ],

    /* ===================== DE FLANCO ===================== */

    'inglesa' => [
        'nombre'       => 'Apertura Inglesa',
        'tipo'         => 'flanco',
        'eco'          => 'A10–A39',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['c4'],
        'resumen'      => 'Su nombre viene de Howard Staunton, el mejor jugador inglés del siglo XIX, que la usó en su match contra Saint-Amant en 1843. En el famoso Campeonato del Mundo de 1972, Bobby Fischer sorprendió a Boris Spassky jugándola en la sexta partida.',
        'idea_blancas' => 'Controlar la casilla d5 desde el flanco, sin comprometer los peones centrales, y desarrollarse a menudo con fianchetto (g3 y Ag2).',
        'idea_negras'  => 'Ocupar el centro que las blancas dejan libre. Tras 1...e5, la posición se parece a una Siciliana pero con los colores invertidos.',
        'planes'       => [
            'Blancas: presión sobre d5 y la gran diagonal, y avance en el flanco de dama con b4 y b5.',
            'Negras: aprovechar el espacio central con ...e5, ...d5 o ...c5.',
        ],
        'errores'      => [
            'Para las blancas: jugar sin plan claro. La flexibilidad de la Inglesa obliga a entender qué estructura conviene en cada caso.',
        ],
        'conceptos'    => 'Control del centro desde el flanco, la flexibilidad y las transposiciones a otras aperturas.',
        'jugadores'    => 'Mijaíl Botvinnik, Garry Kasparov y Magnus Carlsen la usaron con frecuencia.',
    ],

    'reti' => [
        'nombre'       => 'Apertura Réti',
        'tipo'         => 'flanco',
        'eco'          => 'A04–A09',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['Cf3 d5', 'c4'],
        'resumen'      => 'Lleva el nombre de Richard Réti, uno de los fundadores de la escuela hipermoderna. En el torneo de Nueva York de 1924 la usó para derrotar a José Raúl Capablanca, que llevaba ocho años sin perder una partida.',
        'idea_blancas' => 'Atacar el peón de d5 desde el flanco con c4 y el alfil en g2, sin ocupar el centro con peones de inmediato.',
        'idea_negras'  => 'Mantener el peón de d5 con ...c6 o ...e6, o avanzar ...d4 para ganar espacio.',
        'planes'       => [
            'Blancas: fianchetto doble (g3 y b3) y presión de los alfiles sobre el centro.',
            'Negras: aprovechar el espacio central que las blancas no ocupan.',
        ],
        'errores'      => [
            'Para las negras: dejar el peón de d5 sin apoyo; la presión combinada de c4 y el alfil de g2 puede ganarlo.',
        ],
        'conceptos'    => 'Ideas hipermodernas, el fianchetto doble y el control del centro a distancia.',
        'jugadores'    => 'Richard Réti y, en el siglo XX, Mijaíl Botvinnik y Vladimir Kramnik.',
    ],

    'bird' => [
        'nombre'       => 'Apertura Bird',
        'tipo'         => 'flanco',
        'eco'          => 'A02–A03',
        'nivel'        => 'Intermedio',
        'jugadas'      => ['f4'],
        'resumen'      => 'Lleva el nombre de Henry Bird, maestro inglés del siglo XIX que la jugó durante décadas. Las blancas controlan la casilla e5 desde la primera jugada; es como una Defensa Holandesa con los colores invertidos.',
        'idea_blancas' => 'Controlar e5, desarrollarse con Cf3, e3 o g3 y atacar en el flanco de rey.',
        'idea_negras'  => 'Aprovechar la debilidad de la diagonal e1-h4 del rey blanco, a veces con un gambito inmediato (1...e5, el Gambito From).',
        'planes'       => [
            'Blancas: Cf3, e3, Ae2 o fianchetto, enroque corto y juego en el flanco de rey.',
            'Negras: desarrollo rápido y ataque directo contra el rey blanco, que quedó menos protegido.',
        ],
        'errores'      => [
            'Trampa del Gambito From: 1.f4 e5 2.fxe5 d6 3.exd6 Axd6 4.Cc3?? Dh4+ 5.g3 Dxg3+ 6.hxg3 Axg3#. Lo correcto es 4.Cf3, que controla h4.',
        ],
        'conceptos'    => 'Control de casillas desde el flanco, la seguridad del rey y las aperturas "espejo" (la Bird es una Holandesa invertida).',
        'jugadores'    => 'Henry Bird en el siglo XIX; hoy aparece sobre todo en partidas rápidas y online.',
    ],
];
