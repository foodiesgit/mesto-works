<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h2>Creative Hubs</h2>
    <table class="table-bordered">
      <thead>
        <caption>Add Parent</caption>
        <tr class="row">
          <th scope="col">Parent Node</th>
          <th scope="col">Background Color</th>
          <th scope="col">Border Color</th>
        </tr>
      </thead>
      <tbody>
        <tr class="row">
          <td scope="col"><input type="text" name="parent" id="" placeholder="Parent node..."></td>
          <td scope="col">
            <select name="nodes" id="">
              <option selected  disabled>Nodes</option>
              <option value="ellipse">Ellipse</option>
              <option value="triangle">Triangle</option>
              <option value="round-triangle">Round Triangle</option>
              <option value="rectangle">Rectangle</option>
              <option value="round-rectangle">Round Rectangle</option>
              <option value="bottom-round-rectangle">Bottom Round Rectangle</option>
              <option value="cut-rectangle">Cut Rectangle</option>
              <option value="barrel">Barrel</option>
              <option value="rhomboid">Rhomboid</option>
              <option value="diamond">Diamond</option>
              <option value="round-diamond">Round Diamond</option>
              <option value="pentagon">Pentagon</option>
              <option value="round-pentagon">Round Pentagon</option>
              <option value="hexagon">Hexagon</option>
              <option value="round-hexagon">Round-Hexagon</option>
              <option value="concave-hexagon">Concave-Hexagon</option>
              <option value="heptagon">Heptagon</option>
              <option value="round-heptagon">Round Heptagon</option>
              <option value="octagon">Octagon</option>
              <option value="round-octagon">Round Octagon</option>
              <option value="star">Star</option>
              <option value="tag">Tag</option>
              <option value="round-tag">Round Tag</option>
              <option value="vee">Vee</option>
            </select>
          </td>
          <td scope="col"> <input type="color" name="node-background" title="Node Background Color"></td>
          <td scope="col"> <input type="color" name="node-border-color" title="Node Border Color"></td>
        </tr>
        <t class="row"r><input type="button" value="Add Parent" id="add-parent"></t>
      </tbody>
    </table>

    <table class="table-bordered">
      <caption>Add Child</caption>
      <thead>
        <tr class="row">
          <th scope="col">Child Id</th>
          <th scope="col">Child Source</th>
          <th scope="col">Child Target</th>
        </tr>
      </thead>
      <tbody>
        <tr class="row">
          <td scope="col"><input type="text" name="child-id" id="child-id" placeholder="Child id..."></td>
          <td scope="col"><input type="text" name="child-source" id="child-source" placeholder="Child source..."></td>
          <td scope="col"><input type="text" name="child-target" id="child-target" placeholder="Child target..."></td>
        </tr>
        <caption>Edge Line</caption>
        <tr class="row">
          <th scope="col">Edge Style</th>
          <th scope="col">Edge Width</th>
          <th scope="col">Edge Color</th>
        </tr>
        <tr class="row">
          <td scope="col">
            <select name="line-style" id="">
              <option selected  disabled>Edge Line</option>
              <option value="straight">Straight</option>
              <option value="straight-triangle">Straight Triangle</option>
              <option value="bezier">Bezier</option>
              <option value="unbundled-bezier">Unbundled Bezier</option>
              <option value="haystack">Haystack</option>
              <option value="segments">Segments</option>
              <option value="taxi">Taxi</option>
            </select>
          </td>
          <td scope="col"><input type="number" name="line-width"></td>
          <td scope="col"><input type="color" name="line-color"></td>
        </tr>
        <tr class="row"></tr>
        <caption>Arrow Style</caption>
        <tr class="row">
            <td scope="col">
              <select name="arrow-style" id="">
                <option  selected  disabled>Edge Arrow</option>
                <option value="triangle">Triangle</option>
                <option value="triangle-tee">Triangle-Tee</option>
                <option value="circle-triangle">Circle-Triangle</option>
                <option value="square">Square</option>
                <option value="circle">Circle</option>
                <option value="diamond">Diamond</option>
                <option value="chevron">Chevron</option>
                <option value="triangle-cross">Triangle-Cross</option>
                <option value="triangle-backcurve">Triangle-Backcurve</option>
                <option value="vee">Vee</option>
                <option value="Tee">Tee</option>
                <option value="none">None</option>
              </select>
            </td>
            <td scope="col"><input type="color" name="arrow-color"></td>
        </tr>
        <tr class="row"> <input type="button" value="Add Child" id="add-child"></tr>
      </tbody>
    </table>
  </div>
</body>
</html><?php /**PATH C:\Users\Muhtar\Desktop\works\gazibilisim\creativehubs\resources\views/adminpanel.blade.php ENDPATH**/ ?>