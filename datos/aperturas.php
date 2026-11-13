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

    /* ============ INDIAS (1.d4 Cf6) y DE FLANCO: Fase 4B ============ */
];
