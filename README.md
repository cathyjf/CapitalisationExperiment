# The effect of capitalisation on reading speed

Does the use of capital letters in English affect reading speed (compared to
using all lowercase)? In May 2009, using the program contained in this
repository, [Cathy J. Fitzpatrick][cathyjf] and [David Stone][doublewise] carried
out a study to attempt to answer this question.

## Experimental design

The basic idea of this study was to administer reading comprehension tests where
the sample text was either normally capitalised or in all-lowercase and to record
how long it took to complete the test in order to measure reading speed. The
null hypothesis was that the mean reading time would be the same regardless of
whether the text was normally capitalised or in all-lowercase. The alternative
hypothesis was that the mean reading time would be different depending on
whether capitals were used.

The study was conducted using a reading comprehension web application written by
[Cathy J. Fitzpatrick][cathyjf] and contained in this repository. The study web
site explained the nature of the study and invited visitors to participate.
Potential participants were advised that the study would require up to ten
minutes of their time and that they would be timed, so they should focus exclusively
on the reading comprehension test for the duration of those up to ten minutes.

When a visitor agreed to take a test, one of four pre-created reading comprehension
tests was randomly selected, and it was also randomly chosen whether the text would
be in all-lowercase or normally capitalised. Each visitor was allowed to take up to
two tests, but could also stop after taking one. If a visitor decided to take a second
test, it would not be the same reading comprehension sample.

Reading comprehension texts were displayed as images to prevent easy searching through
the text (which might otherwise have been an alternative to reading the text). Together
with the text, subjects were presented with four reading comprehension questions about
the text in order to ensure they had read it. The questions were pre-created and specific
to each individual test. They appeared in a random order for each subject.

Invitations to participate in this study were publicly posted on several popular
internet forums of which the authors were members (notably [Smogon][] and [Smash Boards][]).
After the study had been open for a few weeks, participation dried up, so the
data collection phase of the study was deemed completed.

## Analysis and results

Overview of data:

+ 317 unique persons (IP addresses) participated
+ 427 tests were initiated
+ 261 tests were completed
+ 229 tests had acceptable scores (≥ 50%)

For the remainder of this page, we consider only completed tests with acceptable scores.
The other data is discarded.

All times are measured in minutes.

### Table 1: Mean times

<table>
<tr>
  <th>Test</th>

  <th>Lowercase mean time</th>

  <th>A<sup>*2</sup></th>

  <th>Normal mean time</th>

  <th>A<sup>*2</sup></th>

  <th>Mean difference</th>

  <th>P-value</th>
</tr>

<tr>
  <td>0</td>

  <td>(2.4, 3.19)</td>

  <td><a href='#g1'>0.609</a></td>

  <td>(1.91, 2.59)</td>

  <td><a href='#g2'>0.349</a></td>

  <td>(0.03, 1.08)</td>

  <td>3.98%</td>
</tr>

<tr>
  <td>1</td>

  <td>(2.19, 2.94)</td>

  <td><a href='#g3'>0.425</a></td>

  <td>(2.27, 2.86)</td>

  <td><a href='#g4'>0.355</a></td>

  <td>(-0.47, 0.47)</td>

  <td>99.78%</td>
</tr>

<tr>
  <td>2</td>

  <td>(2.98, 4.48)</td>

  <td><a href='#g5'>0.467</a></td>

  <td>(2.85, 4.04)</td>

  <td><a href='#g6' title="There is strong evidence that this data did not come from a normal distribution."><i>1.018</i>**</a></td>

  <td>(-0.63, 1.2)</td>

  <td>53.2%</td>
</tr>

<tr>
  <td>3</td>

  <td>(2.95, 3.85)</td>

  <td><a href='#g7'>0.21</a></td>

  <td>(2.82, 3.99)</td>

  <td><a href='#g8'>0.71</a></td>

  <td>(-0.71, 0.69)</td>

  <td>97.72%</td>
</tr>
</table>

The [Anderson-Darling statistic][A-star] (A<sup>*2</sup>) was calculated for each of the eight
samples in order to determine whether each sample came from a normally distributed
population. With the exception of normally capitalised test 2, there was no reason
to believe that any of the populations were non-normal. Normally capitalised test 2
exhibited an unusual distribution, but that was ultimately not significant.

For each test, we used the two-tailed [Student's t-test][t-test] to determine whether the
population mean completion lowercase time was equal to the population mean normally
capitalised time. One requirement for this test is that each of the populations
are normally distributed, which appeared to be the case here (again with the possible
exception of normally capitalised test 2). The P-value given in the chart is the
chance of the sample means being this far apart or father if the population means
are equal (that is, a low P-value would mean that the use of capitals has a statically
significant correlation with a change in reading speed).

The intervals shown in the chart are 95% confidence intervals; that is, the true
population mean lies within the interval with 95% confidence. In the case of the
column for the mean difference, if the true mean difference is zero, then it indicates
that the mean reading time is the same regardless of whether capitals are employed.
For tests 1 through 3, the interval does contain zero, but in the case of test 0,
it does not contain zero, so with 95% confidence, the population means are not equal
for test 0.

### Conclusion

There was no reason to reject the null hypothesis for tests 1 through 3. The P-value
was very high for tests 1 and 3. Although it was slightly lower for test 2, it was still
very high, and the relatively low value was likely a result of the non-normal shape of
the sample data for normally capitalised test 2. However, in the case of test 0, the
P-value was much lower and provides evidence that the mean reading time was different
for that test depending on whether it was in capitals or all-lowercase.

These results suggest that for most texts, whether a text is capitalised or not has no
effect on reading speed, but for certain texts it may provide a marginal benefit.
Assuming the effect was not merely caused by chance (of which there is a 3.98% probability),
it was not clear from our study which properties of text 0 caused the use of capitals to
provide a benefit.

### Table 2: Breakdown of completed tests with acceptable scores

This tables shows how many of each kind of test were completed.

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
[Smogon]: http://smogon.com
[Smash Boards]: http://www.smashboards.com
[A-star]: https://en.wikipedia.org/wiki/Anderson-Darling_statistic
[t-test]: https://en.wikipedia.org/wiki/Student%27s_t-test
