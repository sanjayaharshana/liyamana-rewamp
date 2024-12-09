<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabric.js Example</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
<input type="text" id="canvas_data" value="{{ json_encode($object_data) }}">
<canvas id="fabricCanvas" width="827" height="1167"></canvas>
<button id="generatePDF">Generate PDF</button>

<script>
    // Reference to the canvas element
    const canvas = new fabric.Canvas('fabricCanvas');

    // JSON data
    const jsonData = document.getElementById('canvas_data');

    // Load the JSON data into the canvas
    canvas.loadFromJSON(jsonData.value, () => {
        canvas.renderAll(); // Render the canvas after loading
        console.log('Canvas loaded successfully');
    });

    document.getElementById('generatePDF').addEventListener('click', async () => {
        // Export canvas content to an image
        const dataURL = canvas.toDataURL({
            format: 'png',
            multiplier: 1 // Export at the same resolution as the canvas
        });

        console.log(dataURL);
        const { jsPDF } = window.jspdf; // Access jsPDF
        const pdf = new jsPDF('p', 'pt', 'a4'); // Create A4-sized PDF

        // Use exact canvas dimensions for PDF to avoid resizing
        const canvasWidth = canvas.getWidth();
        const canvasHeight = canvas.getHeight();

        pdf.addImage(dataURL, 'PNG', 0, 0, 1240, 1754);

        pdf.save('fabricjs-full-a4.pdf'); // Save PDF
    });
</script>

</body>
</html>
