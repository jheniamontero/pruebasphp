function init(robot){
	console.log("Robot initializing...")
  // your code here
}

function loop(robot){
	robot.action = {type: 'move', amount: 40};
  // your code here
}
//
function init(robot) {
	// your code goes here
}

function loop(robot) {
	
	if (robot.jumpNext) {
		robot.action = {type: 'jump', amount: 10};
		robot.jumpNext = false;
	} else {
		robot.action = {type: 'move', amount: 40};
		robot.jumpNext = true;
	}	
}
//soluciones tres 
let robotX = robot.info().x;
	let landmarks = [360, 500, 560, 760];
  
  	robot.action = {type: 'move', amount: 40};
 	if (landmarks[0] < robotX && robotX < landmarks[1] ||
		 landmarks[2] < robotX && robotX < landmarks[3]) {
      	robot.action = {type: 'jump', amount: 10};
	}


    //otro ventos de puntos
    // your code goes here
	robot.action = {type: 'move', amount: 40};
    if (robot.info().coins % 2 == 1) {
		robot.action.amount = -40;
	}