function rotateCircle(circleId, percentage) {
    const circle = document.getElementById(circleId);
    const rotation = percentage * 3.6;  // since 100% corresponds to 360 degrees
    circle.style.transform = `rotate(${rotation}deg)`;
}

rotateCircle('circle1', 75);
rotateCircle('circle2', 90);
rotateCircle('circle3', 68);
rotateCircle('circle4', 80);
