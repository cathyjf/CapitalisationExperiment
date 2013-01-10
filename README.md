# The effect of capitalisation on reading speed

Does the use of capital letters in English affect reading speed (compared to
using all lowercase)? In May 2009, using the program contained in this
repository, [Cathy J. Fitzpatrick][cathyjf] and [David Stone][doublewise] carried
out an experiment to attempt to answer this question.

## Experimental design

TODO

## Analysis and results

_TODO: Improve this section to add more explanation._

Overview of data:

+ 427 tests were initiated
+ 261 tests were completed
+ 229 tests had acceptable scores (≥ 50%)

For the remainder of this page, we consider only completed tests with acceptable scores.
The other data is discarded.

All times are measured in minutes.

### Table 1: Mean times

<table border="1">
  <tbody>
    <tr>
      <th>Test</th>

      <th>Lowercase mean time</th>

      <th>A<sup>*<sup>2</sup></sup></th>

      <th>Normal mean time</th>

      <th>A<sup>*<sup>2</sup></sup></th>

      <th>Mean difference</th>

      <th>P-value</th>
    </tr>

    <tr>
      <td>0</td>

      <td>(2.22, 3.38)</td>

      <td><a href="#g1">0.609</a></td>

      <td>(1.75, 2.74)</td>

      <td><a href="#g2">0.349</a></td>

      <td>(-0.24, 1.34)</td>

      <td>3.98%</td>
    </tr>

    <tr>
      <td>1</td>

      <td>(2.02, 3.11)</td>

      <td><a href="#g3">0.425</a></td>

      <td>(2.12, 3)</td>

      <td><a href="#g4">0.355</a></td>

      <td>(-0.71, 0.71)</td>

      <td>99.78%</td>
    </tr>

    <tr>
      <td>2</td>

      <td>(2.66, 4.8)</td>

      <td><a href="#g5">0.467</a></td>

      <td>(2.58, 4.31)</td>

      <td><a href="#g6" title="There is strong evidence that this data did not come from a normal distribution."><i>1.018</i></a></td>

      <td>(-1.07, 1.64)</td>

      <td>53.2%</td>
    </tr>

    <tr>
      <td>3</td>

      <td>(2.74, 4.05)</td>

      <td><a href="#g7">0.21</a></td>

      <td>(2.57, 4.25)</td>

      <td><a href="#g8">0.71</a></td>

      <td>(-1.06, 1.04)</td>

      <td>97.72%</td>
    </tr>
  </tbody>
</table>

The intervals are all 95% confidence intervals. The p-value is the chance of the sample means
being this far apart, or father, if proper capitalisation has no effect on the completion time. A
low p-value suggests that the population means are not equal, i.e., that proper capitalisation
has a statistically significant effect on completion time.

### Table 2: Breakdown of completed tests with acceptable scores

<table border="1">
  <tbody>
    <tr>
      <th>Test</th>

      <th>Total completed</th>

      <th>Normally capitalised</th>

      <th>All lowercase</th>
    </tr>

    <tr>
      <td>0</td>

      <td>61</td>

      <td>27</td>

      <td>34</td>
    </tr>

    <tr>
      <td>1</td>

      <td>76</td>

      <td>47</td>

      <td>29</td>
    </tr>

    <tr>
      <td>2</td>

      <td>44</td>

      <td>24</td>

      <td>20</td>
    </tr>

    <tr>
      <td>3</td>

      <td>48</td>

      <td>22</td>

      <td>26</td>
    </tr>
  </tbody>
</table>

### Table 3: Plots of time distributions for each test

<table>
<tr>
  <th></th>
  <th scope="col">All lowercase</th>
  <th scope="col">Normally capitalised</th>
</tr>
<tr>
  <th scope="row">Test 0</th>
  <td>
    <a name="g1"></a>
    <img src="https://raw.github.com/cathyjf/CapitalisationExperiment/master/raw/graph1.png" alt="Graph 1" title="Times for all lowercase version of test 0" />
  </td>
  <td>
    <a name="g2"></a>
    <img src="https://raw.github.com/cathyjf/CapitalisationExperiment/master/raw/graph2.png" alt="Graph 2" title="Times for normally capitalised version of test 0" />
  </td>
</tr>
<tr>
  <th></th>
  <th scope="col">All lowercase</th>
  <th scope="col">Normally capitalised</th>
</tr>
<tr>
  <th scope="row">Test 1</th>
  <td>
    <a name="g3"></a>
    <img src="https://raw.github.com/cathyjf/CapitalisationExperiment/master/raw/graph3.png" alt="Graph 3" title="Times for all lowercase version of test 1" />
  </td>
  <td>
    <a name="g4"></a>
    <img src="https://raw.github.com/cathyjf/CapitalisationExperiment/master/raw/graph4.png" alt="Graph 4" title="Times for normally capitalised version of test 1" />
  </td>
</tr>
<tr>
  <th></th>
  <th scope="col">All lowercase</th>
  <th scope="col">Normally capitalised</th>
</tr>
<tr>
  <th scope="row">Test 2</th>
  <td>
    <a name="g5"></a>
    <img src="https://raw.github.com/cathyjf/CapitalisationExperiment/master/raw/graph5.png" alt="Graph 5" title="Times for all lowercase version of test 2" />
  </td>
  <td>
    <a name="g6"></a>
    <img src="https://raw.github.com/cathyjf/CapitalisationExperiment/master/raw/graph6.png" alt="Graph 6" title="Times for normally capitalised version of test 2" />
  </td>
</tr>
<tr>
  <th></th>
  <th scope="col">All lowercase</th>
  <th scope="col">Normally capitalised</th>
</tr>
<tr>
  <th scope="row">Test 3</th>
  <td>
    <a name="g7"></a>
    <img src="https://raw.github.com/cathyjf/CapitalisationExperiment/master/raw/graph7.png" alt="Graph 7" title="Times for all lowercase version of test 3" />
  </td>
  <td>
    <a name="g8"></a>
    <img src="https://raw.github.com/cathyjf/CapitalisationExperiment/master/raw/graph8.png" alt="Graph 8" title="Times for normally capitalised version of test 3" />
  </td>
</tr>
</table>

## Conclusion

TODO

## Licence

This program is licensed under the [GNU Affero General Public License][agpl3],
version 3 or later.

## Credits

+ [Cathy J. Fitzpatrick][cathyjf] (cathyjf) created this program and
  analysed the results.
+ The experiment design was a joint effort of Cathy J. Fitzpatrick and
  [David Stone][doublewise].

[agpl3]: http://www.fsf.org/licensing/licenses/agpl-3.0.html
[cathyjf]: https://cathyjf.com
[doublewise]: http://doublewise.net
