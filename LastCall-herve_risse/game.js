//IMPORTANT: Make sure to use Kaboom version 0.5.0 for this game by adding the correct script tag in the HTML file.

kaboom({
  global: true,
  fullscreen: false,
  scale: 1,
  debug: true,
  clearColor: [0, 0, 0, 1],
})

// Speed identifiers
const MOVE_SPEED = 150 
const JUMP_FORCE = 560
const PLANE_JUMP_FORCE = 1000
let CURRENT_JUMP_FORCE = JUMP_FORCE
const FALL_DEATH = 400
const ENEMY_SPEED = 35

// Game logic

let isJumping = true

// mise en place sprite

loadRoot('https://i.imgur.com/')
loadSprite('coin', 'wbKxhcd.png')
loadSprite('evil-shroom', 'ygg4qLjh.jpg')//KPO3fR9.png
loadSprite('brick', 'pogC9x5.png')
loadSprite('block', 'M6rwarW.png')
loadSprite('mario', 'Wb1qfhK.png')
loadSprite('mushroom', '0wMd92p.png')
loadSprite('surprise', 'gesQ1KP.png')
loadSprite('unboxed', 'bdrLpi6.png')
loadSprite('pipe-top-left', 'ReTPiWY.png')
loadSprite('pipe-top-right', 'hj2GK4n.png')
loadSprite('pipe-bottom-left', 'c1cYSbt.png')
loadSprite('pipe-bottom-right', 'nqQ79eI.png')

loadSprite('blue-block', 'fVscIbn.png')
loadSprite('blue-brick', '3e5YRQd.png')
loadSprite('blue-steel', 'gqVoI2b.png')
loadSprite('blue-evil-shroom', 'SvV4ueD.png')
loadSprite('blue-surprise', 'RMqCc1G.png')

// creation de map

scene("game", ({ level }) => {
  layers(['bg', 'obj', 'ui'], 'obj')
  
  const maps = [
    [
      '                                                                                             ',
      '                                                                                             ',
      '                                                                                             ',
      '                                                                                             ',
      '                                                                                             ',
      '                                                                                             ',
      '            %  * %                                                                           ',
      '                    ^   ^   z      z        ()                                               ',
      '                                     -+                                                      ',
      '=======================================================!   ===================================',
    ],
    [
      '£                                       £',
      '£                                       £',
      '£                                       £',
      '£                                       £',
      '£                                       £',
      '£        @@@@@@              x x        £',
      '£                          x x x        £',
      '£                        x x x x  x   -+£',
      '£               z   z  x x x x x  x   ()£',
      '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!',
    ]
  ]

  //assignation des sprite avec des sympboles pour la creation de map

  const levelCfg = {
    width: 20,
    height: 20,
    '=': [sprite('block'), solid()],
    '$': [sprite('coin'), 'coin'],
    '%': [sprite('surprise'), solid(), 'coin-surprise'],
    '*': [sprite('surprise'), solid(), 'mushroom-surprise'],
    '}': [sprite('unboxed'), solid()],
    '(': [sprite('pipe-bottom-left'), solid(), scale(0.5)],
    ')': [sprite('pipe-bottom-right'), solid(), scale(0.5)],
    '-': [sprite('pipe-top-left'), solid(), scale(0.5), 'pipe'],
    '+': [sprite('pipe-top-right'), solid(), scale(0.5), 'pipe'],
    '^': [sprite('evil-shroom'), solid(),scale(0.5), 'dangerous'],
    '#': [sprite('mushroom'), solid(), 'mushroom', body()],
    '!': [sprite('blue-block'), solid(), scale(2)],
    '£': [sprite('blue-brick'), solid(), scale(0.5)],
    'z': [sprite('blue-evil-shroom'), solid(), scale(0.5), 'slowshroom'],
    '@': [sprite('blue-surprise'), solid(), scale(0.5), 'coin-surprise'],
    'x': [sprite('blue-steel'), solid(), scale(0.5)],

  }

  const gameLevel = addLevel(maps[level], levelCfg)

  // valeur de base du timer global du niveau

  let TIME_LEFT = 100

  let timer = add([
    text(0),
    pos(160, 6),
    layer('ui'),
    {
      time: TIME_LEFT,
    }
  ])

  // diminution du temps du timer

  timer.action(()=> {
    timer.time -= dt()
    timer.text = timer.time.toFixed(0)
    if(timer.time <= 0 || timer.time > 200) {
      go('lose')
    }
  })

  //affichage de texte 

  add([text('Battery time left :' ), pos(0, 6)])
  
  // caractéristique player
  
  const player = add([
    sprite('mario'), 
    solid(),
    pos(30, 0),
    body(),
    Plane(),
    origin('bot')
  ])
  
  action('mushroom', (m) => {
    m.move(20, 0)
  })
  
  // gestion de la box surprise
  
  player.on("headbump", (obj) => {
    if (obj.is('coin-surprise')) {
      gameLevel.spawn('$', obj.gridPos.sub(0, 1))
      destroy(obj)
      gameLevel.spawn('}', obj.gridPos.sub(0,0))
    }
    if (obj.is('mushroom-surprise')) {
      gameLevel.spawn('#', obj.gridPos.sub(0, 1))
      destroy(obj)
      gameLevel.spawn('}', obj.gridPos.sub(0,0))
    }
  })
  
  // fonction de gestion du bonus du mode avion (durée, hauteur de saut)

  function Plane() {
    let timer = 0
    let isPlane = false
    return {
      update() {
        if (isPlane) {
          CURRENT_JUMP_FORCE = PLANE_JUMP_FORCE + time.time * 3
          timer -= dt()
          if (timer <= 0) {
            this.normalmode()
          }
        }
      },
      isPlane() {
        return isPlane
      },
      normalmode() {
        CURRENT_JUMP_FORCE = JUMP_FORCE
        timer = 0
        isPlane = false
      },
      planemode(time) {
        timer = time
        isPlane = true     
      }
    }
  }

// gestion des collisions du joueur

  player.collides('mushroom', (m) => {
    destroy(m)
    player.planemode(6)
  })

  player.collides('slowshroom', (s)=> {
    destroy(s)
    timer.time -= 20 

  })


  player.collides('coin', (c) => {
    destroy(c)
    scoreLabel.value++
    scoreLabel.text = scoreLabel.value
  })

  action('dangerous', (d) => {
    d.move(-ENEMY_SPEED, 0)
  })

  player.collides('dangerous', (d) => {
    if (isJumping) {
      destroy(d)
    } else {
      go('lose')
    }
  })

  player.action(() => {
    camPos(player.pos)
    if (player.pos.y >= FALL_DEATH) {
      go('lose')
    }
  })

  player.collides('pipe', () => {
    keyPress('s', () => {
      go('game', {
        level: (level + 1) % maps.length,
      })
    })
  })

  // gestion des déplacements du joueur

  keyDown('q', () => {
    player.move(-((MOVE_SPEED+timer.time)/2), 0)
  })

  keyDown('d', () => {
    player.move((MOVE_SPEED+timer.time)/2, 0)
  })

  player.action(() => {
    if(player.grounded()) {
      isJumping = false
    }
  })

  keyPress('space', () => {
    if (player.grounded()) {
      isJumping = true
      player.jump(CURRENT_JUMP_FORCE)
    }
  })

// boule de feu

function spawnFireBall(p){
  add([
    rect(10,10),
    pos(p),
    origin('center'),
    color(1,0,0),
    'bullet'
  ])
}

keyPress('z', () => {
  spawnFireBall(player.pos.add(15, -10))
})

const FIRE_SPEED = 400
action('bullet', (b) => {
  b.move(FIRE_SPEED, 0)
  if (b.pos.x < 0){
    destroy(b)
  }

collides('bullet', 'dangerous', (b,d)=> {
  destroy(b)
  destroy(d)
})

})

})

scene('lose', () => {
  add([text("You failed"), origin('center'), pos(width()/2, height()/ 2)])
})

start("game", { level: 0, score: 0})
