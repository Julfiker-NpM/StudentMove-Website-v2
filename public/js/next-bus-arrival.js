function downloadPDF() {
  const link = document.createElement('a');
  link.href = 'pdf/bus-schedule.pdf';
  link.download = 'StudentMove_Bus_Schedule.pdf';
  link.style.display = 'none';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  alert('PDF downloaded successfully!');
}


