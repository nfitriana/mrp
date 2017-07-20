
        
        <div class="row-fluid">
            <div class="span6">
                <form action="" method="post">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Produk Grup</th>
                                <th>Komponen</th>
                                <th width="300px">Jenis Barang</th>
                                <th width="100px">Jumlah</th>
                                <th width="80px"></th>
                            </tr>
                        </thead>
                        <!--elemet sebagai target append-->
                        <tbody id="itemlist">
                            <tr>
                                <td>
                                    <select name="produkgrup_input[0]" class="form-control input-block-level">
                                        <option value=""></option>
                                            <?php
                                                $query=mysqli_query($conn, "SELECT * FROM tb_group ORDER BY idGroup ASC")or die(mysqli_error());
                                                    while ($tampil=mysqli_fetch_array($query)) {
                                                        echo "<option value='$tampil[idGroup]'>$tampil[nmGroup]</option>";
                                                    }

                                            ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="komponen_input[0]" class="form-control input-block-level">
                                        <option value=""></option>
                                            <?php
                                                $query=mysqli_query($conn, "SELECT * FROM tb_bahanbaku ORDER BY idBhnBaku ASC")or die(mysqli_error());
                                                        while ($tampil=mysqli_fetch_array($query)) {
                                                            echo "<option value='$tampil[idBhnBaku]'>$tampil[nmBhnBaku]</option>";
                                                        }
                                            ?>  
                                    </select>
                                </td>
                                <td><input type="text" name="jenis_input[0]" class="form-control input-block-level" /></td>
                                <td><input type="text" name="jumlah_input[0]" class="form-control input-block-level" /></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-small btn-default" onclick="additem(); return false">+</button>
                                    <button name="submit" class="btn btn-small btn-primary"><i class="icon-ok">Save</i></button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>


            </div>
            <div class="span6">
                <p></p>
                <p>
                    <?php
                    if (isset($_POST['submit'])) {
                        $grupproduk = $_POST['produkgrup_input'];
                        $komp = $_POST['komponen_input'];
                        $jenis = $_POST['jenis_input'];
                        $jumlah = $_POST['jumlah_input'];

                        foreach ($jenis as $key => $j) {
                            echo "<p>" . $j . " : " . $jumlah[$key] . "</p>";
                        }
                    }
                    ?>
                </p>
            </div>
        </div>

        <script type="text/javascript">
            var i = 1;
            function additem() {
//                target append
                var itemlist = document.getElementById('itemlist');
                
//                create element
                var row = document.createElement('tr');
                var produkgrup = document.createElement('td');
                var komponen = document.createElement('td');
                var jenis = document.createElement('td');
                var jumlah = document.createElement('td');
                var aksi = document.createElement('td');
                

//                append element
                itemlist.appendChild(row);
                row.appendChild(produkgrup);
                row.appendChild(komponen);
                row.appendChild(jenis);
                row.appendChild(jumlah);
                row.appendChild(aksi);
                

//                create element input
                var produkgrup_input = document.createElement('select');
                produkgrup_input.setAttribute('name', 'produkgrup_input[' + i + ']');
                produkgrup_input.setAttribute('class', 'input-block-level');

                var komponen_input = document.createElement('select');
                komponen_input.setAttribute('name', 'komponen_input[' + i + ']');
                komponen_input.setAttribute('class', 'input-block-level');

                var jenis_input = document.createElement('input');
                jenis_input.setAttribute('name', 'jenis_input[' + i + ']');
                jenis_input.setAttribute('class', 'input-block-level');

                var jumlah_input = document.createElement('input');
                jumlah_input.setAttribute('name', 'jumlah_input[' + i + ']');
                jumlah_input.setAttribute('class', 'input-block-level');

                var hapus = document.createElement('span');

//                append element input
                produkgrup.appendChild(produkgrup_input);
                komponen.appendChild(komponen_input);
                jenis.appendChild(jenis_input);
                jumlah.appendChild(jumlah_input);
                aksi.appendChild(hapus);

                hapus.innerHTML = '<button class="btn btn-small btn-default">x</button>';
//                create aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };

                i++;
            }
        </script>
