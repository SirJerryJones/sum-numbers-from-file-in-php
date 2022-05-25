const fs = require('fs');

/**
 * @param {string} file filepath relative or absolute of file to read
 */
function readsync(file) {
	try {
		return fs.readFileSync(file, 'utf8');
	} catch (e) {
		console.error(e);
	}
}

sumfile = function (file, results = {}) {
	let data = readsync(file);
	let splited = data.split('\n');
	let prevTotal = 0;
	results[file] = 0;
	let firstFile = Object.keys(results)[0];
	console.log(firstFile);
	for (let i = 0; i < splited.length; i++) {
		if (isFinite(splited[i])) {
			results[firstFile] += parseInt(splited[i], 10);
			results[file] = results[firstFile];
			console.log(results[firstFile] + '---' + results[file]);
		} else {
			prevTotal = results[firstFile];
			results[firstFile] = this.sumfile(splited[i], results)[firstFile];
			results[splited[i]] -= prevTotal;
			console.log(prevTotal);
		}
	}

	return results;
};

console.log(sumfile('./uploads/A.txt'));
