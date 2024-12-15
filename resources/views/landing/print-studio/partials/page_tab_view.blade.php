<div style="padding-top: 30px;" class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{$page_id_tab_page}}" role="tabpanel" aria-labelledby="{{$page_id_tab_page}}-tab">
    <div class="row">
        <!-- Right-side Pane -->
        <div class="col-md-4">
            <!-- Object Properties Pane -->
            <div id="objectProperties{{$page_id_tab_page}}" style="display: none; padding-bottom: 20px;">
                <div style="background: #575757; color: white; padding: 10px; font-size: 14px;">
                    Edit Selected Object
                </div>
                <div style="background: #818181; color: white; padding: 18px;">
                    <div class="form-group">
                        <label for="textValue{{$page_id_tab_page}}" style="font-size: 12px;">Text Value:</label>
                        <input type="text" id="textValue{{$page_id_tab_page}}" class="form-control" style="background: #696969; color: white; margin-top: 5px;" />
                    </div>
                    <div class="form-group">
                        <label for="fontSize{{$page_id_tab_page}}" style="font-size: 12px;">Font Size:</label>
                        <input type="number" id="fontSize{{$page_id_tab_page}}" class="form-control" style="background: #696969; color: white; margin-top: 5px;" />
                    </div>
                    <button id="updateObject{{$page_id_tab_page}}" class="btn btn-primary btn-sm" style="margin-top: 10px;">Update</button>

                </div>
            </div>

            <!-- Generate PDF Button -->
            <div class="" style="padding-bottom: 20px;">
                <div style="background: #575757; color: white; padding: 10px; font-size: 14px;">
                    Export Options
                </div>

                <div style="background: #818181; color: white; padding: 18px;">
                    <div class="form-group">
                        <label for="pdf_size_type{{$page_id_tab_page}}" style="font-size: 12px;">PDF Quality:</label>
                        <select type="number" id="pdf_quality{{$page_id_tab_page}}" class="form-control" style="font-size:15px;background: #696969; color: white; margin-top: 5px;">
                            <option value="a4" selected>A4</option>
                            <option value="a3">A3</option>
                            <option value="a5">A5</option>
                            <option value="b1">B1</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pdf_quality{{$page_id_tab_page}}" style="font-size: 12px;">PDF Quality:</label>
                        <select type="number" id="pdf_quality{{$page_id_tab_page}}" class="form-control" style="font-size:15px;background: #696969; color: white; margin-top: 5px;">
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                            <option value="4">Ultra</option>
                        </select>
                    </div>

                    {{csrf_field()}}
                    <button style="margin-top: 10px;" class="btn btn-primary btn-sm" id="generatePDF{{$page_id_tab_page}}">Generate PDF</button>
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px;">Update Order</button>

                </div>
            </div>
        </div>

        <!-- Canvas Section -->
        <div class="col-md-6" style="text-align: center;border-style: dashed;border-width: 1px;border-color: white;padding: 30px;border-width: 2px;background: gray;">
            <div style="margin-left: 100px;">
                <input type="hidden" name="{{$page_id_tab_page}}" id="canvas_data{{$page_id_tab_page}}" value="{{ json_encode($object_data_value_tab_page) }}">

                <div style="margin-left: 10px">
                    <canvas id="fabricCanvas{{$page_id_tab_page}}" width="420" height="600"></canvas>

                </div>
            </div>


        </div>
        <div class="col-md-2">
            <div style="background: url('{{url('sizes/demo_envolop.png')}}');height: 440px;
    background-size: contain;
    background-repeat: no-repeat;"></div>
        </div>
    </div>

    <script>
        // Reference to the canvas element
        const canvas{{$page_id_tab_page}} = new fabric.Canvas('fabricCanvas{{$page_id_tab_page}}');

        // Load JSON data into the canvas
        const jsonData{{$page_id_tab_page}} = document.getElementById('canvas_data{{$page_id_tab_page}}');
        canvas{{$page_id_tab_page}}.loadFromJSON(jsonData{{$page_id_tab_page}}.value, () => {
            canvas{{$page_id_tab_page}}.renderAll();
            console.log(jsonData{{$page_id_tab_page}}.value);
        });

        // Event listener for object selection
        canvas{{$page_id_tab_page}}.on('selection:created', (e) => {
            const selectedObject = e.selected[0];
            if (selectedObject && selectedObject.type === 'text') {
                // Show the right-side pane
                document.getElementById('objectProperties{{$page_id_tab_page}}').style.display = 'block';

                // Populate textbox with object properties
                document.getElementById('textValue{{$page_id_tab_page}}').value = selectedObject.text || '';
                document.getElementById('fontSize{{$page_id_tab_page}}').value = selectedObject.fontSize || 12;
            }
        });

        // Event listener for object deselection
        canvas{{$page_id_tab_page}}.on('selection:cleared', () => {
            document.getElementById('objectProperties{{$page_id_tab_page}}').style.display = 'none';
        });

        // Update object properties
        document.getElementById('updateObject{{$page_id_tab_page}}').addEventListener('click', () => {
            const activeObject = canvas{{$page_id_tab_page}}.getActiveObject();
            if (activeObject && activeObject.type === 'text') {
                const newTextValue = document.getElementById('textValue{{$page_id_tab_page}}').value;
                const newFontSize = parseInt(document.getElementById('fontSize{{$page_id_tab_page}}').value);

                activeObject.text = newTextValue;
                activeObject.fontSize = newFontSize;

                canvas{{$page_id_tab_page}}.renderAll();
            }
        });

        // Generate PDF
        document.getElementById('generatePDF{{$page_id_tab_page}}').addEventListener('click', async () => {
            const dataURL{{$page_id_tab_page}} = canvas{{$page_id_tab_page}}.toDataURL({
                format: 'png',
                multiplier: 3 // Export at a high resolution
            });

            console.log(dataURL{{$page_id_tab_page}});
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'pt', 'a4'); // Create an A4-sized PDF

            // Add the canvas image to the PDF
            pdf.addImage(dataURL{{$page_id_tab_page}}, 'PNG', 0, 0, 595.28, 841.89); // A4 dimensions in points
            pdf.save('fabricjs-canvas.pdf'); // Save the PDF
        });
    </script>
</div>
