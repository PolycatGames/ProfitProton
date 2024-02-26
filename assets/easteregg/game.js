const runner = document.getElementById('runner');
const gameContainer = document.getElementById('gameContainer');
let isJumping = false;
let gravity = 0.9;
let position = 0;
let gameStarted = false;
let money = 0; // Brokie :)

if (gameStarted == false) {
    document.getElementById('money').textContent = `CLICK TO START`;
}

function startGame() {
    if (gameStarted) return;
    gameStarted = true;

    document.addEventListener('click', function (event) {
        if (event.button === 0) {
            if (!isJumping) {
                isJumping = true;
                jump();
            }
        }
    });

    scheduleNextObstacle();
    increaseMoney();
}

function jump() {
    let count = 0;
    const maxJumpHeight = 150;
    let upInterval = setInterval(() => {
        if (count >= 10) {
            clearInterval(upInterval);
            // Down
            let downInterval = setInterval(() => {
                if (count <= 0) {
                    clearInterval(downInterval);
                    isJumping = false;
                } else {
                    position -= 7.8;
                    count--;
                    position = position * gravity;
                    runner.style.bottom = position + 'px';
                }
            }, 20);
        } else {
            // Up
            position += 22;
            count++;
            position = position * gravity;
            position = position > maxJumpHeight ? maxJumpHeight : position;
            runner.style.bottom = position + 'px';
        }
    }, 20);
}

function createObstacle() {
    const obstacle = document.createElement('img');
    let obstaclePosition = gameContainer.clientWidth;
    obstacle.classList.add('obstacle');
    obstacle.src = '/assets/easteregg/files/taxman.gif';
    gameContainer.appendChild(obstacle);
    obstacle.style.left = obstaclePosition + 'px';

    let timerId = setInterval(() => {
        if (obstaclePosition > 0 && obstaclePosition < 30 && position < 30) {
            clearInterval(timerId);
            alert("Oops! The taxman caught you... \n\nYour gross revenue was $" + money + "\n\nThe taxman took 50% and charged you with a $50 fine, which left you with $" + (money / 2 - 50) + "\n\nDon't commit tax evasion kids...");
            document.location.reload();
        }

        obstaclePosition -= 10;
        obstacle.style.left = obstaclePosition + 'px';
    }, 20);

    scheduleNextObstacle();
}

function scheduleNextObstacle() {
    const minDelay = 400;
    const maxDelay = 2000;
    const delay = Math.random() * (maxDelay - minDelay) + minDelay;

    setTimeout(createObstacle, delay);
}

function increaseMoney() {
    setInterval(() => {
        money++;
        document.getElementById('money').textContent = `$${money}`;
    }, 100);
}

document.addEventListener('click', startGame);
