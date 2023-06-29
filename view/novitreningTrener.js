let intervalCount = 1;

document.getElementById('addInterval').addEventListener('click', function() {
    if(intervalCount < 10) {
        intervalCount++;
        let newInterval = document.createElement('div');
        newInterval.classList.add('form-group', 'interval-group');
        newInterval.innerHTML = `
            <label for="interval${intervalCount}">Interval ${intervalCount}:</label>
            <input type="text" id="interval${intervalCount}" name="interval[]" />
        `;
        document.getElementById('intervalContainer').appendChild(newInterval);
    }
});

document.getElementById('removeInterval').addEventListener('click', function() {
    if(intervalCount > 1) {
        let intervalContainer = document.getElementById('intervalContainer');
        intervalContainer.removeChild(intervalContainer.lastElementChild);
        intervalCount--;
    }
});
